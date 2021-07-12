<?php

namespace App\Http\Controllers;

use App\Admin\SubscriberPackageName;
use App\ForgotPassword;
use App\HelperModel;
use App\MailModel;
use App\PaypalPayment;
use App\TapPaymentData;
use App\User;
use App\affiliateGroup;
use App\affiliatePerson;
use App\affiliateTracking;
use App\affiliateType;
use App\paypal\Paypal;
use App\tapPayment\TapPayment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
use Session;
use Socialite;
use Validator,Redirect,Response,File;
class UserController extends Controller
{
    public function mailTest(){
       $res =  MailModel::mailSend("arafat.dml@gmail.com", "Mail test", "Test Body");
       dd($res);
    }

    /**
     *
     * affiliateValidTimeLimitCheck
     * @author arafat | arafat.dml@gmail.com
     * date: 08/11/2020
     * @return bool | if today is valid or not
     *
    */

    public function affiliateValidTimeLimitCheck($dateRange){
        $isValidToday = false;
        if(trim($dateRange) == "forever"){
            $isValidToday = true;
        }else{
            $validTwoDateIs = explode("to", $dateRange);
            /*
            *--------------------------------------------------------------
            * The today date need to greater than or equal to the start range
            * and today date need to less than or equal to the end date
            *--------------------------------------------------------------
            */
            $firstDate     =  Carbon::now();
            $secondDate    =  Carbon::parse(trim($validTwoDateIs[0]));
            $thirdDate     =  Carbon::parse(trim($validTwoDateIs[1]));
            if( $firstDate->greaterThanOrEqualTo($secondDate) && $firstDate->lessThanOrEqualTo($thirdDate) ){
              $isValidToday = true;
            }
        }
        return $isValidToday;
    }

    /**
     *
     * affiliateProcessingGroup
     * @author arafat | arafat.dml@gmail.com
     * date: 08/11/2020
     * @return array of clientCommision and guestDiscount or false
     */

        public function affiliateProcessingGroup($clientData, $newUserData){

            if(!empty($clientData) && !empty($newUserData)){
                $clientPackageName = trim($clientData->mem_package); // based on client package
                $guestPackageName = trim($newUserData->mem_package); // based on guest package
                // $clientPackageName = "Basic"; // test purpose comment it
                // $guestPackageName = "Business"; // test purpose comment it
                $affiliateType = affiliateType::with(["affiliateGroup"])->where("name", $clientPackageName)->first();
                $guestPackageId = affiliateType::where("name", $guestPackageName)->first();
                // if the affiliate type exist ?
                if($affiliateType){
                    // check if it is true
                    if(@count($affiliateType->affiliateGroup)){
                        foreach($affiliateType->affiliateGroup as $key =>$affGroup ){
                            // if the function inside if return true then
                            // calculate that price return the loop.
                            if( $this->affiliateValidTimeLimitCheck($affGroup->valid_time_limit) ){
                                $price = json_decode( $affGroup->price );
                                // dump($price);
                                $guestPack = strtolower($guestPackageName);
                                $client_key = "client_commision_".$guestPack;
                                $guest_key = "guest_discount_".$guestPack;
                                $client_commision = $price->$client_key;
                                $guest_discount = $price->$guest_key;
                                # return the Result
                                return array(
                                    "affiliate_belong_to" => "client",
                                    "client_id" => $clientData->id,
                                    "guest_id" => $newUserData->id,
                                    "guest_select_package_id" => $guestPackageId->id,
                                    "affiliate_group_id" => $affGroup->id,
                                    "affiliate_person_id" => NULL,
                                    "client_commision" => $client_commision,
                                    "guest_discount" => $guest_discount,
                                );
                            }
                        }
                    }
                }
            }
            return false;
        }

        /**
         *
         * affiliateProcessingPerson
         * @author arafat | arafat.dml@gmail.com
         * date: 08/11/2020
         * @return array of clientCommision and guestDiscount or false
         */
        public function affiliateProcessingPerson($personData, $newUserData){
            if(!empty($personData) && !empty($newUserData)){
                // is the link valid on today date..
                if( $this->affiliateValidTimeLimitCheck($personData->valid_time_limit) ){
                    $guestPackageName = trim($newUserData->mem_package);
                    // $guestPackageName = "Basic"; // test Purpose

                    # For return data...
                    $affiliateTypeId = 0;
                    $affiliateType = affiliateType::where("name", $guestPackageName)->first();
                    if(@count($affiliateType)){
                        $affiliateTypeId = $affiliateType->id;
                    }
                    $price = json_decode( $personData->price );
                    // dump($price);
                    $guestPack = strtolower($guestPackageName);
                    $client_key = "client_commision_".$guestPack;
                    $guest_key = "guest_discount_".$guestPack;
                    $client_commision = $price->$client_key;
                    $guest_discount = $price->$guest_key;
                    # return the Result
                    return array(
                        "affiliate_belong_to" => "person",
                        "client_id" => NULL,
                        "guest_id" => $newUserData->id,
                        "guest_select_package_id" => $affiliateTypeId,
                        "affiliate_group_id" => NULL,
                        "affiliate_person_id" => $personData->id,
                        "client_commision" => $client_commision,
                        "guest_discount" => $guest_discount,
                    );
                }
            }
            return false;
        }


        /**
         *
         * affiliateProcessingSave
         * Inserting data on
         * 1) affiliateTrcking 2) user (guest who create account)
         * 3) affiliatePerson or client(who is the owner of the affiliate link)
         * @author arafat | arafat.dml@gmail.com
         * date: 08/11/2020
         * @return Bool ture on success false on failure.
         *
         */
        public function affiliateProcessingSave($trackingData){
            if(is_array($trackingData)){
                // save the tracking data..
                $affiliateTracking = affiliateTracking::create($trackingData);

                // Guest table need to updated...
                $guestId = $trackingData["guest_id"];
                $guest = User::find($guestId);
                $guestData = array(
                    "me_as_a_guest_discount" => (float) $guest->me_as_a_guest_discount + (float) $trackingData["guest_discount"],
                );
                // update the Guest Data...
                User::where("id", $guestId)->update($guestData);

                // then do any one aaction only
                if($trackingData["affiliate_belong_to"] == "person"){
                    // save data on affiliatePerson table start...
                    $affiliatePersonId = $trackingData['affiliate_person_id'];
                    $affiliatePerson = affiliatePerson::find($affiliatePersonId);
                    $affiliatePersonData = array(
                        "total_client_commission" => (float) $affiliatePerson->total_client_commission + (float) $trackingData["client_commision"],
                        "total_affiliate_num" => (int) $affiliatePerson->total_affiliate_num + 1,
                    );
                    // update the table
                    affiliatePerson::where("id", $affiliatePersonId)->update($affiliatePersonData);

                }else if($trackingData["affiliate_belong_to"] == "client"){
                    // save data on user/client table
                    $clientId = $trackingData['client_id'];
                    $client = User::find($clientId);
                    $clientData = array(
                        "total_client_commission" => (float) $client->total_client_commission + (float) $trackingData["client_commision"],
                        "total_affiliate_num" => (int) $client->total_affiliate_num + 1,
                    );
                    // dd($clientData);
                    // update the client ...
                    User::where("id", $clientId)->update($clientData);
                }

                return true;
            }
            return false;
        }


        /**
         *
         * affiliateProcessing
         * @author arafat | arafat.dml@gmail.com
         * date: 08/11/2020
         *
         */

        public function affiliateProcessing($register_affiliate_link, $newUserData){
            $commisionAndDisscountArr = array();
            // data validation start
            $register_affiliate_link = stripslashes($register_affiliate_link);
            $register_affiliate_link = htmlspecialchars($register_affiliate_link);
            // data validation end

            // check if the affiliate link is belong to a user
            $clientData = User::where("affiliate_link", $register_affiliate_link)->first();
            // dd($clientData);
            if(@count($clientData)){
                $commisionAndDisscountArr = $this->affiliateProcessingGroup($clientData, $newUserData);
            }else {
                // check if the affiliate link is belong to a AffiliatePerson
                $affiliatePersonData = affiliatePerson::where("affiliate_link", $register_affiliate_link)->first();
                if(@count($affiliatePersonData)){
                    $commisionAndDisscountArr = $this->affiliateProcessingPerson($affiliatePersonData, $newUserData);
                }
            }
            // dd($commisionAndDisscountArr);
            // now we need to save the data
            return $this->affiliateProcessingSave($commisionAndDisscountArr);
        }

    public function subscriptionPlansAr(){
        # arafat affiliate checking

        // For working with Affiliate User ...
        if(isset($_GET["affiliate_link"])){
            Session::put("register_affiliate_link", $_GET["affiliate_link"]);
        }
        # end arafat affiliate checking
        return view("ar.SubscriptionplansAR");
    }

    /*=============================================================
    =            add by arafat for sociallite packages            =
    =============================================================*/

    public function redirectToProvider(string $provider)
        {
            try {
                $scopes = config("services.$provider.scopes") ?? [];
                if (count($scopes) === 0) {
                    return Socialite::driver($provider)->redirect();
                } else {
                    return Socialite::driver($provider)->scopes($scopes)->redirect();
                }
            } catch (\Exception $e) {
                abort(404);
            }
        }
        public function handleProviderCallback(string $provider)
        {
            try {
                $data = Socialite::driver($provider)->user();
                return $this->handleSocialUser($provider, $data);
            } catch (\Exception $e) {

               Session::put("message", "Login with ".$provider." Failed Please Try Again");
               return redirect()->route("login");
            }
        }
        public function handleSocialUser(string $provider, object $data)
        {
            // dump($provider);
            // dd($data);
            #-----------------------------------------------
            # Arafat Custom code to Process it
            # -----------------------------------------------
            Session::put("ar_socialite_provider", $provider);
            Session::put("ar_socialite_data", $data);

            return redirect()->route("oAuthBillingShipping");
            #-----------------------------------------------
            # End Arafat Custom code to Process it
            # -----------------------------------------------
        }
    /*=====  End of add by arafat for sociallite packages  ======*/

    /**
     * @date: 27/11/2020
     * @arafat
     * getOauthNameEmail
     * @return Array name, firstName, lastName, Email,
     * @return Or empty Array
     */
    private function getOauthNameEmail()
    {
        # The main Array That We will Return
        $oAuthArr = array();
        if( Session::has('ar_socialite_provider') && Session::has('ar_socialite_data') ){
            $ar_socialite_provider = Session::get("ar_socialite_provider");
            $ar_socialite_data = Session::get("ar_socialite_data");
            if(isset($ar_socialite_data->name) && isset($ar_socialite_data->email)){
                $social_name  = $ar_socialite_data->name;
                $social_email = $ar_socialite_data->email;
                # making the First Name and Last Name
                $name_parts = explode(" ", $social_name);
                if(!isset($name_parts[1])){
                    $name_parts[1] = $social_name;
                }
                $oAuthArr = array(
                    "name" => $social_name,
                    "firstName" => $name_parts[0],
                    "lastName" => $name_parts[1],
                    "email" => $social_email,
                );
            }
        }
        return $oAuthArr;
    }

    /**
     * @date: 26/11/2020
     * @arafat
     * oAuthBillingShipping
     * If user Do not enter Billing Shipping take this
     */
    public function oAuthBillingShipping(){
        // dd($this->getOauthNameEmail());
        # Checking if the Ouath Data Retriving is Successfull
        $isOauthData = $this->getOauthNameEmail();
        if( $isOauthData ){
            $email = $isOauthData["email"];
            #--------------------------------------------------
            # Check if the User Already Provide Billing Shipping
            $customer = User::where("email", $email)->first();
            if(@count($customer)){
                # Check If the User Already Paid
                if($customer->is_payment_done == 1){
                    # Check If the User Subscription Is Valid Today
                    # This chek will Run if the Plan Is not Basic
                    if($customer->mem_package != "Basic"){
                        # Check if customer paid is Invalid today
                        $first_date = Carbon::now();
                        $second_date =  Carbon::parse($customer->payment_valid_till);
                        if( !$first_date->lessThanOrEqualTo($second_date) ){
                            # User Subscription Expired so Make the
                            # is_payment_done 1 to 0 ...
                            # Update User Table
                            User::where("email", $email)->update(["is_payment_done" => 0]);

                            Session::put("customerEmail", $email);
                            Session::put("class", "danger");
                            Session::put('message','Your Subscription Is Endeed re-subscribe Again!');
                            return redirect()->route("subscriptionPaymentPage");
                        }
                    }
                    # All the Checkings are Doen Let's do the login
                    Auth::loginUsingId($customer->id);
                    return redirect()->route("home");
                    # Now Login the User
                }
                # We are here That means Payment Is not Done Redirect to Payment Page
                Session::put("customerEmail", $email);
                Session::put("message","Please Complete Your Payment In order To access The Dashboard");
                return redirect()->route("subscriptionPaymentPage");
            }

            # If We have the Package Name
            # Redirect User For taking the Billing, Shipping
            # Taking Payment And Login
            if(Session::has("plan_is")){

                $subscriber_package_name_id = Session::get("plan_is");

                $planName = SubscriberPackageName::find($subscriber_package_name_id);

                if( $planName ){
                    $planName = $planName->name;
                }else{
                    $planName = NULL;
                }

                Session::put("message", "Your Selected Plan is <span style='color:red'>".$planName);
                return view("ar.OauthBillingShipping");
            }

            # This Else Condition is Added By Arafat
            # For Client want if social login data not found
            # Redirect to take billing shiping with select package
            # Premium ... that's the Reason

            else{

                # set Session
                Session::put("plan_is", 2);

                $subscriber_package_name_id = Session::get("plan_is");

                $planName = SubscriberPackageName::find($subscriber_package_name_id);

                if( $planName ){
                    $planName = $planName->name;
                }else{
                    $planName = NULL;
                }

                Session::put("message", "Your Selected Plan is <span style='color:red'>".$planName);


                return view("ar.OauthBillingShipping");

            }

            # end lse Condition is Added By Arafat 

            # If We do Not have The Package Name We need to
            # Redirect to Subscription Plan Page
            // return redirect()->route("subscriptionPlansAr");
        }

        # We have Problem With SocialIte So throw Error and Redirect
        Session::put("class", "error");
        Session::put("message", "Opps ! Something Went wrong with Social Login ! Please Try again");
        return redirect()->route("login");

    }

    /**
     * @date: 26/11/2020
     * @arafat
     * oAuthBillingShippingProcess
     * If user Do not enter Billing Shipping take this
     */

    public function oAuthBillingShippingProcess(Request $request){
        // dd(Session::get("plan_is"));
        // dump($this->getOauthNameEmail());
        // dd($request);

        # Here We Register the Customer, take Payment, And Do the Login
        $oAuthData = $this->getOauthNameEmail();
        $email = $oAuthData["email"];


        # --------------------------------------
        # ----------------------------------------
        # --------------------------------------

        $planIs = Session::get("plan_is");
       
        # Helper Module
        $helperData = HelperModel::clientPackageSuitHelper( $planIs );
        # End Helper Module

        #----------------------------------------
        # Check billing Same as Shipping arafat
        $isBillingSameAsShiping = "no";
        if(isset($request->bill_same_as_shipping)){
            $isBillingSameAsShiping = "yes";
        }
        # End Checking Billing Same As Shipping arafat
        # ---------------------------------------------
        # Save the Billing and Shipping to The db


        # Data pricessing for Store
        $subsCribeData = array(
            "suit" => $helperData["suit_identity"],
            "name" => $oAuthData["name"],
            "first_name" => $oAuthData["firstName"],
            "last_name" => $oAuthData["lastName"],
            "email" => $oAuthData["email"],
            "password" => md5(Str::random(8)),
            "ship_add_1" => $request->ship_add_1,
            "ship_add_2" => $request->ship_add_2,
            "ship_country" => $request->ship_country,
            "ship_region" => $request->ship_region,
            "ship_city" => $request->ship_city,
            "ship_phone" => $request->ship_phone,
            "ship_postal_code" => $request->ship_postal_code,
            "ship_another_number" => $request->ship_another_number,
            "bill_same_as_shipping" => $isBillingSameAsShiping,
            "bill_add_1" => $request->bill_add_1,
            "bill_add_2" => $request->bill_add_2,
            "bill_country" => $request->bill_country,
            "bill_region" => $request->bill_region,
            "bill_city" => $request->bill_city,
            "bill_phone" => $request->bill_phone,
            "bill_postal_code" => $request->bill_postal_code,
            "bill_another_number" => $request->bill_another_number,
            "verify" => 1, // When User verify email it will be 1
            "status" => 1, // if we wanna disable the user for some reason
            "agree_on_term_condition" => $request->agree_on_term_condition,
            "mem_package" => $helperData["mem_package"],
            "mem_fee" => $helperData["mem_fee"],
            "is_payment_done" => $helperData["is_payment_done"],
            'affiliate_link' => str_replace(" ", "", $oAuthData["firstName"]."_".$oAuthData["lastName"])."_".Str::random(8),
            "subscriber_package_name_id" => $helperData["subscriber_package_name_id"],
            "user_register_by" => "oauthApi",
            "created_at" => Carbon::now(),
        );

        $isUserSubscribed = User::create($subsCribeData);

        # arafat let's do the affiliate Works
        if(Session::has("register_affiliate_link")){
            $register_affiliate_link = Session::get("register_affiliate_link");
            // now delete the session data
            Session::forget("register_affiliate_link");
            $this->affiliateProcessing($register_affiliate_link, $isUserSubscribed);
        }
        # Ends Arafat of Affiliate Works ....


        if($isUserSubscribed){

            # ------------------------------
            # Send Suit Email
            HelperModel::sendUserSuitMail($oAuthData["name"], $oAuthData["email"], $helperData["suit_identity"], $request->ship_country);
            # End Suit Email
            #------------------------------

            # Redirect user To the Payment If Payment Needed
            if($planIs != "Basic"){
                Session::put("customerEmail", $email);
                Session::put('message','Please Provide The Subscription Fee From your Desire Payment Gateway!');
                return redirect()->route("subscriptionPaymentPage");
            }
            # If user Not Subscribe to the Basic plan then Login the User
            # All the Checkings are Doen Let's do the login
            Auth::loginUsingId($isUserSubscribed->id);
            return redirect()->route("home");
            # Now Login the User
        }
        # Something Went Wrong Customer Can not Created Database Error
        Session::put('message','Data Can not Save ! SomeThing Went Wrong When we Try to Create The Social Customer Billing Shipping');
        return redirect()->route("login");
    }

    /**
     * @date: 26/11/2020
     * @arafat
     * loginAr
     * Show the Login page Only
     */

    public function loginAr(){

        # we need to clear the session here

        Session::forget("plan_is");        

        # we need to clear the session here


        // dd(Session::get("message"));
        // Session::put("class", "danger");
        // Session::put("message", "HI there");
        # if auth User Id found Redirect to home
        if(Auth()->user()){
            return redirect()->route("home");
        }

        return view("ar.LoginAR");
    }


    /**
     * @date 26/11/2020
     * @author arafat | arafat.dml@gmail.com
     * customerLogin
     * Login the Customer
     */

    public function customerLogin(Request $request){
        # arafat set cookie for remember me Function
        $cookiePersistenceTime = (86400 * 30); // 1 day *  30 day = 1 months
        if(isset($request->remember_me)){
            # Set The cookie
            setcookie("email", $request->email, ( time() + $cookiePersistenceTime ), "/");
            setcookie("password", $request->password, ( time() + $cookiePersistenceTime ), "/");
        }else{
            # Remove the Cookie
            setcookie("email", $request->email, ( time() - $cookiePersistenceTime ), "/");
            setcookie("password", $request->password, ( time() - $cookiePersistenceTime ), "/");
        }
        # End arafat set cookie for remember me Function
        // dd($request);
        $email = $request->email;
        $password = md5($request->password);

        $customer = User::where("email", $email)->where("password", $password)->first();
        // dd($customer);

        # If email or Password Error Redirect to Login
        if(!$customer){
            Session::put("class", "danger");
            Session::put('message','User Name or Password is Not Valid ! Try Again.');
            return redirect()->route("login");
        }

        # Check if customer Paid Already or if not redirect
        else if($customer->is_payment_done == 0){
            # Not paid Yet...
            Session::put("customerEmail", $email);
            Session::put("Please Complete Your Payment In order To access The Dashboard");
            return redirect()->route("subscriptionPaymentPage");
        }
        # This chek will Run if the Plan Is not Basic
        if($customer->mem_package != "Basic"){
            # Check if customer paid is Invalid today
            $first_date = Carbon::now();
            $second_date =  Carbon::parse($customer->payment_valid_till);
            if( !$first_date->lessThanOrEqualTo($second_date) ){
                # User Subscription Expired so Make the
                # is_payment_done 1 to 0 ...
                # Update User Table
                User::where("email", $email)->update(["is_payment_done" => 0]);

                Session::put("customerEmail", $email);
                Session::put("class", "danger");
                Session::put('message','Your Subscription Is Endeed re-subscribe Again!');
                return redirect()->route("subscriptionPaymentPage");
            }
        }
        # All the Checkings are Doen Let's do the login
        Auth::loginUsingId($customer->id);
        return redirect()->route("home");
    }

    /**
     * @date 26/11/2020
     * @author arafat | arafat.dml@gmail.com
     * forgetPassProcess
     * check if the mail exist in db and send mail or show error
     */
    public function forgetPassProcess(Request $request){
        // dd($request);
        $email = $request->email;
        $customer = User::where("email", $email)->first();
        // dump($customer);

        if(@count($customer)){
            // save code and send mail with code
            $code = Str::random(6);
            $hash = md5(date("Ymd").$code);
            $data = array(
                "email" => $email,
                "hash" => $hash,
                "verify_code" => $code,
                "verify_time_limit" => Carbon::now()->addMinutes(30),
                "verify" => 0,
            );

            # We wanna keep 1 record per user forgot Pass
            # why ? Other wise It will misbehave we are
            # showing reset-pass page if verify 1
            # if We keep multiple and find first
            # Some times it will not give access reset pass
            # So delete any previous table data
            ForgotPassword::where("email", $email)->delete();

            # ---------------------------------------------------

            # Create the forGot Password For this Email
            $forgotCreate = ForgotPassword::create($data);

            # Now We Need to Send The Email...
            $passWordVerifiLink = route("forgetPassResetLink")."/".$email."/".$hash;

            # Sending Email

            $customerEmail = $email;

            $messageBody="Successfully Reset Password for https://www.guarantaccess.com/. "."Click This link for verification  ".$passWordVerifiLink." Or verify The Password Reset using verification code. Your Verification Code: ".$code." ";

            # Sending Mail using Arafat Model
            MailModel::mailSend($customerEmail, "Password Reset Request", $messageBody);

/*            Mail::send([], [],function ($message) use ($customerEmail,$messageBody) {
               $message->from('services@guarantaccess.com','Shop And Ship');
               $message->subject("Password Reset Request");
               $message->setBody($messageBody);
               $message->to($customerEmail);
            });*/

            # End Sending Email
            # We need to Set the Seesion Email That is The key of all
            # Process
            Session::put("customerEmail", $email);

            # Redirect user To code Verify Page
            return redirect()->route("forgetPassVerifyPage");

        }else{
            // Email not found in db
            Session::put("class", "danger");
            Session::put("message", "Sorry The Email Does not belong to Any user");
            return redirect()->route("forgotPasswordAr");
        }
    }

    /**
     *
     * @author arafat
     * data: 27/11/2020
     * forgetPassVerifyPage
     *
     */
    public function forgetPassVerifyPage(){
        // session::put("customerEmail", "arafat.dml@gmail.com");
        return view("ar.forgetPassVerifyPage");
    }

    /**
     *
     * @author arafat
     * data: 27/11/2020
     * forgetPassVerifyPageProcess
     *
     */
    public function forgetPassVerifyPageProcess(Request $request){
       // dd($request);
       $email = $request->email;
       $code = $request->verification_code;

       $isVerify = ForgotPassword::where("email", $email)->where("verify_code", $code)->first();

       if(@count($isVerify)){
        # Check The Password is Already Changed using this code
        if($isVerify->verify  == 1){
            Session::put("class", "info");
            Session::put('message','Your Already Reset Password Using This Please Login!');
            return redirect()->route("login");
        }
        # Check The Password is Already Changed using this code

        # Verify is Succcess Now check the time limit
        # start arafat web_lover Here we will check the 30 minutes time limit
        $first_date = Carbon::now();
        $second_date =  Carbon::parse($isVerify->verify_time_limit);
        if( !$first_date->lessThanOrEqualTo($second_date) ){
            Session::put("class", "danger");
            Session::put('message','Your Verification Time Limit has Exceed!');
            return redirect()->route("forgotPasswordAr");
        }
        # end arafat web_lover Here we will check the 30 minutes time limit

        # We Will update the ForgotPassword  verify 0 to 1 and Give Access
        # Reset page ... In reset Page we check    ForgotPassword verify 1
        # If Yes We Allow to Reset Or We Will Redirect To Login Page

        # --------------------------------------------------------
        # Doing The ForgotPassword Update
        ForgotPassword::where("email", $email)->update(["verify" => 1]);

        # Now Redirect the User to The Password Reset Page
        return redirect()->route("forgetPassResetPage");

       }else{
        # verify is Failed... The code is Wrong
        Session::put("class", "danger");
        Session::put("message", "Verification Code is Invalid ! Please check Your Email And Enter The Correct Code");
        return redirect()->route("forgetPassVerifyPage");
       }

    }


    /**
     *
     * @author arafat
     * data: 27/11/2020
     * forgetPassResetLink
     *
     */
    public function forgetPassResetLink($email, $hash){
        // dump($email);
        // dd($hash);

        $isVerify = ForgotPassword::where("email", $email)->where("hash", $hash)->first();

        if(@count($isVerify)){

         # Check The Password is Already Changed using this code
         if($isVerify->verify  == 1){
             Session::put("class", "info");
             Session::put('message','Your Already Reset Password Using This Please Login!');
             return redirect()->route("login");
         }
         # Check The Password is Already Changed using this code

         # Verify is Succcess Now check the time limit
         # start arafat web_lover Here we will check the 30 minutes time limit
         $first_date = Carbon::now();
         $second_date =  Carbon::parse($isVerify->verify_time_limit);
         if( !$first_date->lessThanOrEqualTo($second_date) ){
             Session::put("class", "danger");
             Session::put('message','Your Verification Time Limit has Exceed!');
             return redirect()->route("forgotPasswordAr");
         }
         # end arafat web_lover Here we will check the 30 minutes time limit

         # We Will update the ForgotPassword  verify 0 to 1 and Give Access
         # Reset page ... In reset Page we check    ForgotPassword verify 1
         # If Yes We Allow to Reset Or We Will Redirect To Login Page

         # --------------------------------------------------------
         # Doing The ForgotPassword Update
         ForgotPassword::where("email", $email)->update(["verify" => 1]);

         # Now Redirect the User to The Password Reset Page
         return redirect()->route("forgetPassResetPage");

        }else{
         # verify is Failed... The code is Wrong
         Session::put("class", "danger");
         Session::put("message", "Verification Link is Invalid Please check Your Email And Use The Correct Link You Can The Verification Code Also");

         return redirect()->route("forgetPassVerifyPage");

        }

    }



    /**
     *
     * @author arafat
     * data: 27/11/2020
     * forgetPassResetPage
     *
     */
    public function forgetPassResetPage(){
        $email = Session::get("customerEmail");
        $isValidUser = ForgotPassword::where("email", $email)->where("verify", 1)->first();

        if(@count($isValidUser)){
            return view("ar.forgetPassResetPage");
        }else{
            Session::put("class", "danger");
            Session::put('message','You Are Not Allowed Here For reset The Password!');
            return redirect()->route("login");
        }
    }

    /**
     *
     * @author arafat
     * data: 27/11/2020
     * forgetPassResetProcess
     *
     */
    public function forgetPassResetProcess(Request $request){
        // dd($request);
        $email = Session::get("customerEmail");
        $isValidUser = ForgotPassword::where("email", $email)->where("verify", 1)->first();

        if(@count($isValidUser)){
            # Let's Reset The Password
            $password = md5($request->password);

            # Update the User table
            User::where("email", $email)->update(["password" =>  $password]);
            # Give the falsh Message And Redirect the User
            Session::put('message','You Are Successfully Reset Your Password Please Login');
            return redirect()->route("login");
        }else{
            Session::put("class", "danger");
            Session::put('message','You Are Not Allowed Here For reset The Password!');
            return redirect()->route("login");
        }

    }


    /**
     *
     * paypalProcessPayment
     * @author arafat | arafat.dml@gmail.com
     * @date: 14/11/2020
     * process Simple Paypal Payment
     *
     */

    public function paypalProcessPayment(){
      $paypal = new Paypal();
      // $paypal->CreateSimplePaymentAndAuthorizeUser("Merchant", 104);
      $paypal->CreateSimplePaymentAndAuthorizeUser("Premium", 49);
    }

    /**
     *
     * paypalExecutePayment
     * @author arafat | arafat.dml@gmail.com
     * @date: 14/11/2020
     * Execute Simple Paypal Payment
     *
     */

    public function paypalExecutePayment(){
      $paypal = new Paypal();
      // dd($paypal->apiContext);
      $paypal->ExecuteSimplePayment();

      # ---------------------------------------
      # Arafat code for database Store
      # ---------------------------------------
        /*if(isset($_GET)){
          foreach($_GET as $k =>$v){
              echo $k ." : $v "."<br/>";
          }
      }
      dump($_SESSION);
      */

      # Update User Table
      $email = Session::get("customerEmail");
      $userUpdate = User::where("email", $email)->update(["pay_with" => "paypal", "is_payment_done" => 1, "payment_valid_till" => Carbon::now()->addDays(190)]);

      # We need User id
      $customer = User::where("email", $email)->first();
      # Now we set the Get data Here ...
      $paymentId = isset($_GET["paymentId"]) ? $_GET["paymentId"] : 0;
      $PayerID = isset($_GET["PayerID"]) ? $_GET["PayerID"] : 0;
      $invoiceNumber = isset($_SESSION["invoiceNumber"]) ? $_SESSION["invoiceNumber"] : 0;
      # End Settting Up the Get data
      $data = array(
        "user_id" => $customer->id,
        "user_select_package_name" => $customer->mem_package,
        "package_price" => $customer->mem_fee,
        "payment_valid_till" => Carbon::now()->addDays(190),
        "payment_id" => $paymentId,
        "payer_id" => $PayerID,
        "invoice_number" => $invoiceNumber,
      );

      # Save the Paypal Data..
      $paypaPaymentSave = PaypalPayment::create($data);

      # Now Redirect to the Login page
      Session::put("message", "Payment CAPTURED Successfully ! You can Login");
      return redirect()->route("login");

      # ---------------------------------------
      # End Arafat code for database Store
      # ---------------------------------------

    }



    /*====================================================================
    =            TapPayment By arafat | arafat.dml@gmail.com             =
    ====================================================================*/

    /**
     *
     * @date 18/11/2020
     * @author arafat | arafat.dml@gmail.com
     * tapPaymentProcessPayment
     * @param $redirectUrl, $postUrl
     * @return It will Process the TapPayment
     * We need to define the Redirect url and Post Url
     *
     */

    public function tapPaymentProcessPayment(){
        dd("For test only Now I make it Depricated");

        $redirectUrl = route("tappayment-execute-payment");
        $postUrl = route("tappayment-post-url");
        // dump($redirectUrl);
        // dd($postUrl);

        // create object and call it..
        $TapPayment = new TapPayment;
        $createData = array(); // here lot of multi data arriverd
        $TapPayment->createCharge( $createData );

    }

    /**
     *
     * @date 18/11/2020
     * @author arafat | arafat.dml@gmail.com
     * tapPaymentExecutePayment
     * This Will be the Redirect url and
     * We Execute the payment Here
     * @param $paymentId
     * @return It will Provide the Paymnet Data By Id
     *
     */
    public function tapPaymentExecutePayment(Request $request){
        // dd($request);
        if(isset($_GET["tap_id"])){
            $chargeId = $_GET["tap_id"];
            // create object and call it..
            $TapPayment = new TapPayment;
            $paymentData = $TapPayment->executeCharge($chargeId);


            // echo "<pre>";
            // print_r( $paymentData->reference );
            // echo "</pre>";

            // echo $chargeId;
            // echo json_encode( $paymentData->reference );



            // if Payment Not CAPTURED Then redirect
            if( isset( $paymentData->status ) && $paymentData->status == "CAPTURED" ){
                // save necessary data in the db
                // user table --> is_payment_done = 1
                // tapPayment data

                # Update User Table
                $email = Session::get("customerEmail");
                $userUpdate = User::where("email", $email)->update(["pay_with" => "tappayment", "is_payment_done" => 1, "payment_valid_till" => Carbon::now()->addDays(190)]);

                // dump($userUpdate);

                # Create TapPayment Data ...
                # We need User id
                $customer = User::where("email", $email)->first();
                $data = array(
                    "user_id" => $customer->id,
                    "charge_id" => $chargeId,
                    "tap_reference" => json_encode( $paymentData->reference ),
                    "payment_valid_till" => Carbon::now()->addDays(190),
                    "created_at" => Carbon::now(),
                );

                # store the data in database
                $tapPaymentCreate  = TapPaymentData::create($data);

                // dump($tapPaymentCreate);
                # Now Redirect to the Login page
                Session::put("message", "Payment CAPTURED Successfully ! You can Login");
                return redirect()->route("login");

            }else{
                // payment not Taken ...
                Session::put("class", "danger");
                Session::put("message", "Your Payment Status is ".$paymentData->status." ! :( Please Try Agian or Contact Us.");

                return redirect()->route("subscriptionPaymentPage");
            }
        }else{
            // Api does not return anything we have problem taking payment
            Session::put("class", "danger");
            Session::put("message", "Opps ! Something Went Wrong. Payment is not CAPTURED Try again Or Contact us");

            return redirect()->route("subscriptionPaymentPage");
        }

    }

    /**
     *
     * Date: 18/11/2020
     * @author arafat | arafat.dml@gmail.com
     * tapPaymentPostUrl
     * This is Just a postUrl
     *
     */

    public function tapPaymentPostUrl(Request $request){
        // dump($request);
    }

    /*=====  End of TapPayment By arafat | arafat.dml@gmail.com   ======*/


    /**
    *
    * data: 25/11/2020
    * @author: arafat
    * isRegistrationMailAlreadyExist
    * @return 1 or 0
    *
    */

    public function isRegistrationMailAlreadyExist(Request $request){
        $email = $request->email;
        $isEmailFound = User::Where("email", $email)->first();
        if(@count($isEmailFound)){
            echo 1;
        }else{
            echo 0;
        }
    }

    /**
     *
     * @author arafat | arafat.dml@gmail.com
     * @date 25/11/2020
     * EmailVerifyUsingCode
     * @return verify the Email using Code
     *
     */

    public function EmailVerifyUsingCode(Request $request){
        // dd($request);
        $email = $request->email;
        $code = $request->verification_code;

        # Query on database
        $res = User::where("email", $email)->where("verify_code", $code)->first();
        // dump($res);
        if(@count($res)){
            if($res->verify == 1){
                Session::put('message','Your Account Allready Verify. !!');
                return redirect()->route("subscriptionPaymentPage");
            }else{
                # start arafat web_lover Here we will check the 30 minutes time limit
                $first_date = Carbon::now();
                $second_date =  Carbon::parse($res->verify_time_limit);
                if( !$first_date->lessThanOrEqualTo($second_date) ){
                    Session::put("class", "danger");
                    Session::put('message','Your Verification Time Limit has Exceed!');
                    return redirect()->route("login");
                }
                # end arafat web_lover Here we will check the 30 minutes time limit

                # All are ok Now update the email verifiaction option
                User::where("email", $email)->update(["verify" => 1]);

                Session::put("message", "Your Account Verify Successfully Done.");
                return redirect()->route("subscriptionPaymentPage");
            }
        }else{
            # Code or Wrong ...
            Session::put("class", "danger");
            Session::put('message','Sorry The Code you Enter is Incorrect Please Try Again');
            return redirect()->route("emailVerificationPage");
        }

    }

    /**
     *
     * @author arafat | arafat.dml@gmail.com
     * @date 25/11/2020
     * EmailVerifyUsingLink
     * @return Verify email using Link
     *
     */

    public function EmailVerifyUsingLink($email, $hash){
        # Query on database
        $res = User::where("email", $email)->where("hash", $hash)->first();
        // dd($res);
        if(@count($res)){
            # if some reason email is deleted form session then set it
            Session::put("customerEmail", $res->email);
            if($res->verify == 1){
                Session::put('message','Your Account Allready Verify. !!');
                return redirect()->route("subscriptionPaymentPage");
            }else{
                # start arafat web_lover Here we will check the 30 minutes time limit
                $first_date = Carbon::now();
                $second_date =  Carbon::parse($res->verify_time_limit);
                if( !$first_date->lessThanOrEqualTo($second_date) ){
                    Session::put("class", "danger");
                    Session::put('message','Your Verification Time Limit has Exceed!');
                    return redirect()->route("login");
                }
                # end arafat web_lover Here we will check the 30 minutes time limit

                # All are ok Now update the email verifiaction option
                User::where("email", $email)->update(["verify" => 1]);

                Session::put("message", "Your Account Verify Successfully Done.");
                return redirect()->route("subscriptionPaymentPage");
            }
        }else{
            # Code or Wrong ...
            Session::put("class", "danger");
            Session::put('message','Sorry The Link you Use is Incorrect ! Please Try Again, You can find it In your email Or you can Use Code That we send in your email');
            return redirect()->route("login");
        }

    }

    /**
     * @date: 25/11/2020
     * @author arafat | arafat.dml@gmail.com
     * subscriptionPaymentPage
     * Payment Page
     */

    public function subscriptionPaymentPage(){
        # Here may arise a problem if the email not found in the session

        /**
        *
        * Here we need a check ... if the session mail
        * user already provide the payment redirect him for login
        * Keep a a var in table is payment done
        *
        **/

        $email = Session::get("customerEmail");
        $customer = User::where("email", $email)->first();
        // dd($customer);
        if(@count($customer)){
            if($customer->is_payment_done == 1){
                return redirect()->route("login");
            }
        }

        # If any reason the Customer email not found in session
        # Redirect To subscription page
        if(!$email){
            return redirect()->route("subscriptionPlansAr");
        }

        return view("ar.subscriptionPaymentPage", compact('customer'));
    }

    /**
     *
     * @date 26/11/2020
     * @author arafat | arafat.dml@gmail.com
     * subscriptionPaymentRedirect
     * This will redirect the user to the associate payment api
     * paypal | mada Pay | credit debit card |
     *
     */

    public function subscriptionPaymentRedirect(Request $request){
        $email = Session::get("customerEmail");

        // dump($request);
        if($request->payment_option == "mada_pay"){
            # update the user tap_payment_option
            User::where("email", $email)->update(["tap_payment_option" => "mada_pay"]);

            $this->madaPaymentTaking();
        }else if($request->payment_option == "credit_debit_card"){
            # update the user tap_payment_option
            User::where("email", $email)->update(["tap_payment_option" => "credit_debit_card"]);

            $this->creditVisaCardPaymetTaking();
        }else{
            $this->paypalPaymentTaking();
        }
    }

    /**
     * @date: 26/11/2020
     * @author arafat | arafat.dml@gmail.com
     * madaPaymentTaking
     * Taking mada Payment
     */

    private function madaPaymentTaking(){

        $email = Session::get("customerEmail");
        $customer = User::where("email", $email)->first();
        // dd($customer);

        $redirectUrl = route("tappayment-execute-payment");
        $postUrl = route("tappayment-post-url");

        $createData = [
          "amount"=> $customer->mem_fee,
          // "currency"=> "KWD",
          "currency"=> "SAR",
          "threeDSecure"=> true,
          "save_card"=> false,
          "description"=> $customer->mem_package."of user ".$customer->first_name." ".$customer->last_name,
          "statement_descriptor"=> $customer->mem_package,
          "metadata"=> [
            "udf1"=> $customer->mem_package,
            "udf2"=> $customer->mem_package
          ],
          "reference"=> [
            "transaction"=> "txn_".$customer->verify_code,
            "order"=> "ord_".$customer->verify_code
          ],
          "receipt"=> [
            "email"=> true,
            "sms"=> true
          ],
          "customer"=> [
            "first_name"=> $customer->first_name,
            "middle_name"=> $customer->last_name,
            "last_name"=> $customer->last_name,
            "email"=> $customer->email,
            "phone"=> [
              // "country_code"=> "966",
              "number"=> $customer->bill_phone
            ]
          ],
          "source"=> [
            // "id"=> "src_all"
            "id"=> "src_sa.mada"
            // "id" => "src_all"
          ],
          "post"=> [
            "url"=> $postUrl
          ],
          "redirect"=> [
            "url"=> $redirectUrl
          ]
        ];

        // create object and call it..
        $TapPayment = new TapPayment;

        $TapPayment->createCharge( $createData );

    }

    /**
     * @date: 26/11/2020
     * @author arafat | arafat.dml@gmail.com
     * creditVisaCardPaymetTaking
     * Taking credit Visa Card Paymet Taking
     */

    private function creditVisaCardPaymetTaking(){

        $email = Session::get("customerEmail");
        $customer = User::where("email", $email)->first();
        // dd($customer);

        $redirectUrl = route("tappayment-execute-payment");
        $postUrl = route("tappayment-post-url");

        $createData = [
          "amount"=> $customer->mem_fee,
          // "currency"=> "KWD",
          "currency"=> "SAR",
          "threeDSecure"=> true,
          "save_card"=> false,
          "description"=> $customer->mem_package."of user ".$customer->first_name." ".$customer->last_name,
          "statement_descriptor"=> $customer->mem_package,
          "metadata"=> [
            "udf1"=> $customer->mem_package,
            "udf2"=> $customer->mem_package
          ],
          "reference"=> [
            "transaction"=> "txn_".$customer->verify_code,
            "order"=> "ord_".$customer->verify_code
          ],
          "receipt"=> [
            "email"=> true,
            "sms"=> true
          ],
          "customer"=> [
            "first_name"=> $customer->first_name,
            "middle_name"=> $customer->last_name,
            "last_name"=> $customer->last_name,
            "email"=> $customer->email,
            "phone"=> [
              // "country_code"=> "966",
              "number"=> $customer->bill_phone
            ]
          ],
          "source"=> [
            "id"=> "src_all"
            // "id"=> "src_sa.mada"
            // "id" => "src_all"
          ],
          "post"=> [
            "url"=> $postUrl
          ],
          "redirect"=> [
            "url"=> $redirectUrl
          ]
        ];

        // create object and call it..
        $TapPayment = new TapPayment;

        $TapPayment->createCharge( $createData );

    }

    /**
     * @date: 26/11/2020
     * @author arafat | arafat.dml@gmail.com
     * paypalPaymentTaking
     * Taking paypal Payment
     */

    private function paypalPaymentTaking(){
        $email = Session::get("customerEmail");
        $customer = User::where("email", $email)->first();
        // dd($customer);
        $packageName = $customer->mem_package;
        # Remember we have 2 price in saudi real and in dolar
        $packagePriceInDolar = $customer->mem_fee;

        # Let's taking the payment Using Dolar
        $paypal = new Paypal();
        $paypal->CreateSimplePaymentAndAuthorizeUser($packageName, $packagePriceInDolar);

    }



    /**
     * @date: 23/11/2020
     * subscribe
     * @author arafat | arafat.dml@gmail.com
     * Subscribe the user to a Plan
     */

    public function subscribe(Request $request)
    {
        // dd($request);
        $randomNum = Str::random(6);
        $hash = date("YmdHis").$randomNum;
        

        $planIs = Session::get("plan_is");

        # Helper Module
        $helperData = HelperModel::clientPackageSuitHelper( $planIs );
        # End Helper Module

        # Check billing Same as Shipping arafat
        $isBillingSameAsShiping = "no";
        if(isset($request->bill_same_as_shipping)){
            $isBillingSameAsShiping = "yes";
        }
        # End Checking Billing Same As Shipping arafat

        // echo $randomNum;
        // dump($planIs);
        // dump($isBillingSameAsShiping);
        // dd($request);

        # Dara pricessing for Store
        $subsCribeData = array(
            "suit" => $helperData["suit_identity"],
            "name" => $request->first_name." ".$request->last_name,
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "password" => md5($request->password),
            "ship_add_1" => $request->ship_add_1,
            "ship_add_2" => $request->ship_add_2,
            "ship_country" => $request->ship_country,
            "ship_region" => $request->ship_region,
            "ship_city" => $request->ship_city,
            "ship_phone" => $request->ship_phone,
            "ship_postal_code" => $request->ship_postal_code,
            "ship_another_number" => $request->ship_another_number,
            "bill_same_as_shipping" => $isBillingSameAsShiping,
            "bill_add_1" => $request->bill_add_1,
            "bill_add_2" => $request->bill_add_2,
            "bill_country" => $request->bill_country,
            "bill_region" => $request->bill_region,
            "bill_city" => $request->bill_city,
            "bill_phone" => $request->bill_phone,
            "bill_postal_code" => $request->bill_postal_code,
            "bill_another_number" => $request->bill_another_number,
            "hash" => $hash,
            "verify_code" => $randomNum,
            "verify_time_limit" => Carbon::now()->addMinutes(30),
            "verify" => 0, // When User verify email it will be 1
            "status" => 1, // if we wanna disable the user for some reason
            "agree_on_term_condition" => $request->agree_on_term_condition,
            "mem_package" => $helperData["mem_package"],
            "mem_fee" => $helperData["mem_fee"],
            "is_payment_done" => $helperData["is_payment_done"],
            'affiliate_link' => str_replace(" ", "", $request->first_name."_".$request->last_name)."_".Str::random(8),
            "subscriber_package_name_id" => $helperData["subscriber_package_name_id"],
            "created_at" => Carbon::now(),
        );

        $isUserSubscribed = User::create($subsCribeData);
        // dump($isUserSubscribed);
        # arafat let's do the affiliate Works
        if(Session::has("register_affiliate_link")){
            $register_affiliate_link = Session::get("register_affiliate_link");
            // now delete the session data
            Session::forget("register_affiliate_link");
            $this->affiliateProcessing($register_affiliate_link, $isUserSubscribed);
        }
        # Ends Arafat of Affiliate Works ....

        $customerEmail = $request->email;

        if($isUserSubscribed){
            # We need to send a email To the user for email verify
            $routeNameIs = route("EmailVerifyUsingLink")."/";

            $messageBody="Successfully Registration https://www.guarantaccess.com/. "."Click This link for verification  ".$routeNameIs."$customerEmail/".$hash." "." Or verify your email using verification code. Your Verification Code: ".$randomNum." ";

            # Sending Mail using Arafat Model
            MailModel::mailSend($customerEmail, "Registration Email Verification", $messageBody);

            # ------------------------------
            # Send Suit Email
            HelperModel::sendUserSuitMail($request->first_name." ".$request->last_name, $request->email, $helperData["suit_identity"], $request->ship_country);
            # End Suit Email
            #------------------------------

        }
        // we Need it when we redirect user to the email verification page
        Session::put("customerEmail", $customerEmail);
        # Redirect The page
        return redirect()->route("emailVerificationPage");

    }

    /**
     *
     * @author arafat | arafat.dml@gmail.com
     * @date 25/11/2020
     * emailVerificationPage
     * Page for entry verification code
     */

    public function emailVerificationPage(){
        // Session::put("customerEmail", "arafat.dml@gmail.com");
        // Session::put("message", "My put Message Goes Here");
        // Session::put("class", "danger");
        $customerEmail  =  Session::get("customerEmail");
        return view("ar.verifyEmailUsingCode", compact('customerEmail'));
    }


    /**
     *
     * @date: 05/12/2020
     * @author arafat | arfat.dml@gmail.com
     * startFromBeganing
     * If after going in the payment page client
     * wish to start form beganing then We will
     * delete the data in the user table using email
     *  that we store using the session email
     * We will also forget the Session Email
     * then We redirect the clint in the subscribe page
     * Again
     * @return redirect to subscriptionPlansAr route
     *
    */
    public function startFromBeganing(){
        if(Session::has('customerEmail')){
            $email = Session::get("customerEmail");

            # Delete the user data so that we can start again
            $res = User::where("email", $email)->delete();
            if($res){
                # we need to forget the user email
                Session::forget("customerEmail");
                return redirect()->route("subscriptionPlansAr");
            }
        }
        // For some reason we do not have the email in the sesion
        // redirect the user to the login page
        Session::put("class", "danger");
        Session::put('message','We can not Start form Beganing ! We can not find your email in the Session . Session is Expired. Please Contact us');
        return redirect()->route("login");
    }

}
