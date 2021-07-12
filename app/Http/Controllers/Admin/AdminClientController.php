<?php

namespace App\Http\Controllers\Admin;

use App\Admin\SubscriberPackageName;
use App\HelperModel;
use App\Http\Controllers\Controller;
use App\PaypalPayment;
use App\TapPaymentData;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AdminClientController extends Controller
{
    public function adminClientList(){
    	
    	$adminClientLists = User::select(["id", "name",'name2', "suit", "email","ship_phone", "mem_package", "mem_fee", "status","authenticated"])->get();
        foreach($adminClientLists as $a)
        {
            $a->authenticated = ($a->authenticated == 0) ? 'No' : 'YES';
        }
        if( $adminClientLists ){
            $adminClientLists = $adminClientLists->toArray();
        }

    	// dump($adminClientLists);

    	return view("admin.adminClient.adminClientList", compact('adminClientLists'));
    }

    public function adminClientListByAdmin(){
        
        $adminClientLists = User::select(["id", "name", "suit", "email","ship_phone", "mem_package", "mem_fee", "status"])->where("user_register_by", "admin")->get();

        if( $adminClientLists ){
            $adminClientLists = $adminClientLists->toArray();
        }

        // dump($adminClientLists);

        return view("admin.adminClient.adminClientListByAdmin", compact('adminClientLists'));
    }



    public function adminClientDetails($id = NULL){
    	// dd($id);

        $TapPaymentDataDetails = false;
        $PaypalPaymentDataDetails = false;

    	$id = (int) $id;
    	
    	$user = User::find($id);

        if( $user ){

            $user = (object) $user->toArray();

            if( ( $user->mem_fee != 0 ) && ($user->is_payment_done == 1) ){

                # TapPayment
                $TapPaymentDataDetails = TapPaymentData::where("user_id", $user->id)->get();
                if($TapPaymentDataDetails && $TapPaymentDataDetails->count() > 0){
                    $TapPaymentDataDetails = (object) $TapPaymentDataDetails->toArray();
                }

                # paypal
                $PaypalPaymentDataDetails = PaypalPayment::where("user_id", $user->id)->get();
                if( $PaypalPaymentDataDetails && $PaypalPaymentDataDetails->count() >0){
                    $PaypalPaymentDataDetails = (object) $PaypalPaymentDataDetails->toArray();
                }
            }
        }

        
     //    dump($TapPaymentDataDetails);
     //    dump($PaypalPaymentDataDetails);
    	// dd($user);
        

    	return view("admin.adminClient.adminClientDetails", compact('user', 'TapPaymentDataDetails', 'PaypalPaymentDataDetails'));

    }

    public function adminClientEdit($id = NULL){
    	// dd($id);
        $id = (int) $id;

        $subscriberPackageNameList = HelperModel::get_subscriber_package_list();

        // dd($subscriberPackageNameList);

        $clientData  = User::find($id);

        // dump($clientData);

        return view("admin.adminClient.adminClientEdit", compact('clientData', 'subscriberPackageNameList'));

    }

    public function adminClientUpdate(Request $request){
    	// dd($request);

        # Update using this Id
        $id = (int) $request->id;

        $isBillingSameAsShiping = "no";
        if(isset($request->bill_same_as_shipping)){
            $isBillingSameAsShiping = "yes";
        }

        $mem_package = "Basic";
        $mem_fee = 0;
        $subscriber_package_name_id = 0;
        $is_payment_done = 0;

        $subscriber_package_name_id_is = (int) $request->subscriber_package_name;
        $subscriber_package_name_is = SubscriberPackageName::find($subscriber_package_name_id_is);

        // dump($subscriber_package_name_is);

        if( $subscriber_package_name_is ){
            $mem_package = $subscriber_package_name_is->name;
            $mem_fee = $subscriber_package_name_is->price_in_saudi_riyal;
            $subscriber_package_name_id  =  $subscriber_package_name_is->id;
        }

        // dump($mem_package);
        # When it is basic we wanna say payment is done 
        # We use these check in a front-end login for Basic
        if( $mem_package == "Basic" ){
            $is_payment_done = 1;
        }



        $clientUpdateData = array(
            "name" => $request->first_name,
            "name2" => $request->last_name,
            "fullName" => $request->first_name." ".$request->last_name,
            "email" => $request->email,

            "ship_add_1" => $request->shipping_address_1,
            "ship_add_2" => $request->shipping_address_2,
            "ship_country" => $request->shipping_state,
            "ship_region" => $request->shipping_region,
            "ship_city" => $request->shipping_city,
            "ship_phone" => $request->shipping_phone,
            "ship_postal_code" => $request->shipping_postal_code,
            "ship_another_number" => $request->shipping_another_number,
            "bill_same_as_shipping" => $isBillingSameAsShiping,
            "bill_add_1" => $request->billing_address_1,
            "bill_add_2" => $request->billing_address_2,
            "bill_country" => $request->billing_state,
            "bill_region" => $request->billing_region,
            "bill_city" => $request->billing_city,
            "bill_phone" => $request->billing_phone,
            "bill_postal_code" => $request->billing_postal_code,
            "bill_another_number" => $request->billing_another_number,

            "subscriber_package_name_id" => $subscriber_package_name_id,
            "mem_package" => $mem_package,
            "mem_fee" => $mem_fee,
            "is_payment_done" => $is_payment_done,

            'affiliate_link' => str_replace(" ", "", $request->first_name."_".$request->last_name)."_".Str::random(8),
            "updated_at" => Carbon::now(),

        );

        $res = User::where("id", $id)->update($clientUpdateData);

        if( $res ){

            HelperModel::flash("Client Update Successfull", "primary");
        }else{

            HelperModel::flash("Client Update Failed", "danger");
        }

        return redirect()->route("adminClientList");


    }

    public function adminClientActiveDeactive($id = NULL){

    	$id = (int) $id;
    	
    	$user = User::select("status")->find($id);

    	$updateStausIs = 0;

    	if($user->status == 0){
    		$updateStausIs = 1;
    	}

    	$statusUpdate = array(

    		"status" => $updateStausIs,
    	);

    	# Update the Status
    	$userUpdate = User::where("id", $id)->update( $statusUpdate );
    	
    	if( $userUpdate ){

    		HelperModel::flash("Client Update Successfull", "primary");
    	}else{

    		HelperModel::flash("Client Update Failed", "danger");
    	}

    	return redirect()->route("adminClientList");

    }

    public function adminClientDelete($id = NULL){
    	// dd($id);
        $id = (int) $id;

        $res = User::where("id", $id)->delete();

        if($res){
            HelperModel::flash("Client Delete Successfull", "primary");
        }else{

            HelperModel::flash("Client Delete Failed", "danger");
        }

        return redirect()->route("adminClientList");

        
    }


    public function adminClientAdd(){
        $subscriberPackageNameList = HelperModel::get_subscriber_package_list();

        // dd($subscriberPackageNameList);

        return view("admin.adminClient.adminClientAdd", compact("subscriberPackageNameList"));
    }

    public function adminClientStore(Request $request){
        // dump($request);

        $randomNum = Str::random(6);
        $hash = date("YmdHis").$randomNum;

        $isBillingSameAsShiping = "no";
        if(isset($request->bill_same_as_shipping)){
            $isBillingSameAsShiping = "yes";
        }

        $helperData = HelperModel::clientPackageSuitHelper( (int) $request->subscriber_package_name );

        
        $clientStoreData = array(
            "suit" => $helperData["suit_identity"],
            "name" => $request->first_name,
            "name2" => $request->last_name,
            "fullName" => $request->first_name." ".$request->last_name,
            "email" => $request->email,
            "password" => md5($request->password),
            "ship_add_1" => $request->shipping_address_1,
            "ship_add_2" => $request->shipping_address_2,
            "ship_country" => $request->shipping_state,
            "ship_region" => $request->shipping_region,
            "ship_city" => $request->shipping_city,
            "ship_phone" => $request->shipping_phone,
            "ship_postal_code" => $request->shipping_postal_code,
            "ship_another_number" => $request->shipping_another_number,
            "bill_same_as_shipping" => $isBillingSameAsShiping,
            "bill_add_1" => $request->billing_address_1,
            "bill_add_2" => $request->billing_address_2,
            "bill_country" => $request->billing_state,
            "bill_region" => $request->billing_region,
            "bill_city" => $request->billing_city,
            "bill_phone" => $request->billing_phone,
            "bill_postal_code" => $request->billing_postal_code,
            "bill_another_number" => $request->billing_another_number,
            "hash" => $hash,
            "verify_code" => $randomNum,
            "verify_time_limit" => Carbon::now()->addMinutes(30),
            "verify" => 1,
            "status" => 1,
            "agree_on_term_condition" => "agree",
            "user_type" => "customer",
            "subscriber_package_name_id" => $helperData["subscriber_package_name_id"],
            "mem_package" => $helperData["mem_package"],
            "mem_fee" => $helperData["mem_fee"],
            "is_payment_done" => $helperData["is_payment_done"],
            'affiliate_link' => str_replace(" ", "", $request->first_name."_".$request->last_name)."_".Str::random(8),
            "user_register_by" => "admin",
            "created_at" => Carbon::now(),

        );


        $res = User::create($clientStoreData);

        if( $res ){
            HelperModel::flash("Client Creation Successfull", "primary");


            # ------------------------------
            # Send Suit Email
            HelperModel::sendUserSuitMail($request->first_name." ".$request->last_name, $request->email, $helperData["suit_identity"], $request->shipping_state);
            # End Suit Email
            #------------------------------
        }else{

            HelperModel::flash("Client Creation Failed", "danger");
        }

        return redirect()->route("adminClientList");

    }

  
}
