<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\tapPayment\TapPayment;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\paypal\Paypal;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\affiliateGroup;
use App\affiliatePerson;
use App\affiliateTracking;
use App\affiliateType;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
/*    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }*/

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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
    /*    // remove this
        $newUserData = User::find(3);
        // dd($newUserData);
        $register_affiliate_link = Session::get("register_affiliate_link");
        // dump($register_affiliate_link);
        $this->affiliateProcessing($register_affiliate_link, $newUserData);
        die();*/
        // dd($register_affiliate_link = Session::get("register_affiliate_link"));
        $newUserData =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mem_package' => $data['mem_package'],
            'password' => Hash::make($data['password']),
            'affiliate_link' => str_replace(" ", "", $data['name'])."_".Str::random(8),
        ]);

        if(Session::has("register_affiliate_link")){
            $register_affiliate_link = Session::get("register_affiliate_link");
            // now delete the session data
            Session::forget("register_affiliate_link");
            $this->affiliateProcessing($register_affiliate_link, $newUserData);
        }

        return $newUserData;
    }

}