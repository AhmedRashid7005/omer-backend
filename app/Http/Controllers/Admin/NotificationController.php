<?php

namespace App\Http\Controllers\Admin;

use App\Admin\ClientSendEmailNotification;
use App\Admin\EmailTemplate;
use App\Admin\SubscriberPackageName;
use App\HelperModel;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NotificationController extends Controller
{


    public function sendNotification(){

    	$subscriberPackageNames = HelperModel::get_subscriber_package_list();

    	$subscriberPackageNames["person"] = "Person";

    	$mail_type = $this->mailTypeList();


    	return view("admin.MessageNotification.notification", compact('subscriberPackageNames', 'mail_type'));
    }

    public function sendNotificationProcess( Request $request ){
    	// dd($request);
    	// allow only basic, business, premium only 
    	// query db and if result found send a module that do 
    	// same task for the below module also

    	$subscriberPackageNameId = (int) $request->notification_send_to_is;
    	$subscriberPackageName = SubscriberPackageName::find($subscriberPackageNameId);



    	# Right data send
    	if( @count($subscriberPackageName) ){

    		# Need addition check

    		$subscriber_package_name_id = $subscriberPackageName->id;
    		$mem_package = $subscriberPackageName->name;
    		# end additional checking

    		$users = User::where("subscriber_package_name_id", $subscriber_package_name_id)->orWhere("mem_package", $mem_package)->get();

    		// dd($users);

    		if($users){
    		    
    		    # Save notification to the database

    		    $notificationSubject = $request->subject;
    		    $notificationBody = $request->body;

    		    HelperModel::saveEmailNotificationDb( $users, $notificationSubject, $notificationBody, "notification" );
    		    # End Save notification to the database

    		    HelperModel::flash("Notification Send Successfully", "primary");

    		}else{

    		    HelperModel::flash("Notification Send Failed", "danger");

    		}

    	}else{
    		# Wrong data send.. do not have the subsriberPack Name
    		HelperModel::flash("Notification Send Failed", "danger");
    	}

    	

    	return redirect()->route("sendNotification");

    }

    public function sendNotificationPost(Request $request){
    	// dd($request);

    	# Checking if all the value are empty !!
    	if( empty($request->name) && empty($request->email) && empty($request->suit) && empty($request->mobile_number) )
    	{
    		HelperModel::flash("Please Search By using At least One Input Field ! You are Searching with Empty Value", "danger");

    		return redirect()->route("sendNotification");
    	}
    	# Finish Now Do the Checking

    	# Keep Tracking the Input we search for

    	Session::flash("search_name", $request->name);
    	Session::flash("search_email", $request->email);
    	Session::flash("search_suit", $request->suit);
    	Session::flash("search_mobile_number", $request->mobile_number);

    	# End Keep Tracking the Input we search for


    	# Adding Our Dynamic Query Here
    	$query = User::orderBy("id");

    	if( $request->name ){
    		$query = $query->where('name', 'like', '%' . $request->name . '%');
    	}
    	if( $request->email ){
    		$query = $query->orWhere("email", $request->email);
    	}
    	if( $request->suit ){
    		$query = $query->orWhere("suit", $request->suit);

    	}
    	if( $request->mobile_number ){
    		$query = $query->orWhere("ship_phone", $request->mobile_number);
    		$query = $query->orWhere("ship_another_number", $request->mobile_number);
    		$query = $query->orWhere("bill_phone", $request->mobile_number);
    		$query = $query->orWhere("bill_another_number", $request->mobile_number);

    	}
    	# End Adding Our Dynamic Query Here

    	$res = $query->get();

    	if(!count($res)){
    		HelperModel::flash("Please Search Again !! No Result Found", "danger");

    		return redirect()->route("sendNotification");
    	}

    	$subscriberPackageNames = HelperModel::get_subscriber_package_list();

    	$subscriberPackageNames["person"] = "Person";

    	# Now we need to keep Selected the person by default
    	Session::flash("notificaton_default_select", "person");

    	$mail_type = $this->mailTypeList();

    	return view("admin.MessageNotification.notification", compact('subscriberPackageNames', 'res', 'mail_type'));

    }


    private function mailTypeList()
    {
    	$mail_type = EmailTemplate::OrderBy("id", "DESC")->get();

    	if($mail_type){
    	    $mail_type = HelperModel::make_list($mail_type);
    	    // dd($mail_type);
    	}

    	$mail_type["new"] = "New";

    	return $mail_type;

    }

    
    public function processPostNotification(Request $request){

        # if we pass get request
        if($request->isMethod('get')){
            return redirect()->route("sendNotification");
        }

        Session::put("client_ids", $request->client_ids);

        # We can send Mail from template or we can write new mail

    	$mail_type = $this->mailTypeList();

        // dd($mail_type);

        # End We can send Mail from template or we can write new mail

		//Added Newly.
		//$users = User::all();

        return view("admin.MessageNotification.sendNotification", compact( "mail_type"));
    }


    public function sendNotificationClient(Request $request){

        # if we pass get request
        if($request->isMethod('get')){
            return redirect()->route("sendNotification");
        }

        $client_ids = Session::get("client_ids");

        // dump($client_ids);
        // dd($request);

        $notificationSubject = $request->subject;
        $notificationBody = $request->body;


        $users = User::whereIn("id", $client_ids)->get();

        // dd($users);

        if($users){
            
            # Save notification to the database

            HelperModel::saveEmailNotificationDb( $users, $notificationSubject, $notificationBody, "notification" );
            # End Save notification to the database

            HelperModel::flash("Notification Send Successfully", "primary");

        }else{

            HelperModel::flash("Notification Send Failed", "danger");

        }

        return redirect()->route("sendNotification");
    }

    public function getAllSendNotification(){
    	$res = ClientSendEmailNotification::where("type", "notification")->get();

    	if( $res ){
    		$res = $res->toArray();
    	}

    	$title = "All Notificaion  List";

    	$deleteRoute = route("notificationDelete");

    	return view("admin.MessageNotification.messageNotificationList", compact("res", "title", "deleteRoute"));

    }

    public function notificationDelete($id = NULL){

    	$id = (int) $id;

    	$res = ClientSendEmailNotification::where("id", $id)->delete();

    	if($res){
    		HelperModel::flash("Data Deleted Successfull", "success");
    	}else{
    		HelperModel::flash("Data Deleted Failed", "danger");
    	}

    	return redirect()->route("getAllSendNotification");

    }

}
