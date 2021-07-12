<?php

namespace App\Http\Controllers\Admin;

use App\Admin\ClientSendEmailNotification;
use App\Admin\EmailTemplate;
use App\HelperModel;
use App\Http\Controllers\Controller;
use App\MailModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    public function sendMessage(){

    	return view("admin.MessageNotification.message");
    }

    public function sendMessagePost(Request $request){
    	// dd($request);

    	# Checking if all the value are empty !!
    	if( empty($request->name) && empty($request->email) && empty($request->suit) && empty($request->mobile_number) )
    	{
    		HelperModel::flash("Please Search By using At least One Input Field ! You are Searching with Empty Value", "danger");

    		return redirect()->route("sendMessage");
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

    		return redirect()->route("sendMessage");
    	}

    	return view("admin.MessageNotification.message", compact('res'));
    }

    public function processPostMessage(Request $request){

        # if we pass get request
        if($request->isMethod('get')){
            return redirect()->route("sendMessage");
        }

        Session::put("client_ids", $request->client_ids);

        # We can send Mail from template or we can write new mail

        $mail_type = EmailTemplate::OrderBy("id", "DESC")->get();

        if($mail_type){
            $mail_type = HelperModel::make_list($mail_type);
            // dd($mail_type);
        }

        $mail_type["new"] = "New";
        // dd($mail_type);

        # End We can send Mail from template or we can write new mail


        return view("admin.MessageNotification.sendEmail", compact("mail_type"));
    }

    public function sendMail(Request $request){

        # if we pass get request
        if($request->isMethod('get')){
            return redirect()->route("sendMessage");
        }

        $client_ids = Session::get("client_ids");

        // dump($client_ids);
        // dd($request);

        $mailSubject = $request->subject;
        $mailBody = $request->body;

        $to = array();

        $users = User::whereIn("id", $client_ids)->get();

        if($users){

            # Save the Email to the Database

            HelperModel::saveEmailNotificationDb( $users, $mailSubject, $mailBody, "email" );

            # End save the Email to the Database
            
            $mailFromAre = env("MAIL_FROM_ADDRESS");
            $mailNameAre = env("MAIL_FROM_NAME");

            # Getting the Mail list Form Users..
            foreach ($users as $k => $v) {
                $to = $v->email;

                $res = Mail::send([], [],function ($message) use ($to, $mailSubject, $mailBody, $mailFromAre, $mailNameAre) {
                   $message->from($mailFromAre, $mailNameAre);
                   $message->subject($mailSubject);
                   $message->setBody($mailBody, 'text/html');
                   $message->to($to);
                });

            }

            HelperModel::flash("Mail Send Successfully", "primary");

        }else{

            HelperModel::flash("Mail Send Failed", "danger");

        }

        return redirect()->route("sendMessage");
    }


    public function getAllSendEmail(){
        $res = ClientSendEmailNotification::where("type", "email")->get();

        if( $res ){
            $res = $res->toArray();
        }

        $title = "All Email  List";

        $deleteRoute = route("emailDelete");

        return view("admin.MessageNotification.messageNotificationList", compact("res", "title", "deleteRoute"));

    }

    public function emailDelete($id = NULL){

        $id = (int) $id;

        $res = ClientSendEmailNotification::where("id", $id)->delete();

        if($res){
            HelperModel::flash("Data Deleted Successfull", "success");
        }else{
            HelperModel::flash("Data Deleted Failed", "danger");
        }

        return redirect()->route("getAllSendEmail");

    }



}
