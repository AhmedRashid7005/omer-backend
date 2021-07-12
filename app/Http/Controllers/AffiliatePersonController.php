<?php

namespace App\Http\Controllers;

use App\MailModel;
use App\affiliatePerson;
use App\affiliateTracking;
use App\affiliateType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
class AffiliatePersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responses
     */
    public function index()
    {
       $affiliatePersons = affiliatePerson::where('type', 'person')->get();
       // dd($affiliatePersons);
       return view("affiliate.affiliatePerson.affiliatePersonList", compact("affiliatePersons"));
    }

    /**
     *
     * sendMail
     * @author arafat | arafat.dml@gmail.com
     * @date: 15/11/2020
     * Send mail details about the affiliate Person
     *
     */

    public function sendMail($id){
        $id = (int) $id;
        $affiliatePerson = affiliatePerson::find($id);
        if(!@count($affiliatePerson)){
            // redirect
            Session::flash("message", "Something Went Wrong !");
            return redirect()->route("listAffiliatePerson");
        }

        if(empty($affiliatePerson->email)){
            // redirect
            Session::flash("message", "Oops ! The Affiliate Person Do not has A Email Address. We Can not Send  Email !");
            return redirect()->route("listAffiliatePerson");
        }
        // dd($affiliatePerson);
        $name = $affiliatePerson->name;
        $email = $affiliatePerson->email;
        $identity_num = $affiliatePerson->identity_num;
        $affiliate_link = URL::to('/')."/register?affiliate_link=".$affiliatePerson->affiliate_link;
        $valid_time_limit = $affiliatePerson->valid_time_limit;
        $total_client_commission = $affiliatePerson->total_client_commission;
        $total_affiliate_num = $affiliatePerson->total_affiliate_num;
        $created_at = $affiliatePerson->created_at->diffForHumans();
        $prices = json_decode( $affiliatePerson->price);
        $priceIs = NULL;
        $priceDiv = NULL;
        // For price design....
        foreach($prices as $k => $v){
            $div_design = 2;

            // price as the Client Recommanded Way...
            if(strpos($k, 'guest_discount_') !== false){
            $priceIs .= "<strong>Guest Discount When using your link or Code :$v</strong><br/>";
            }else{
                if( $div_design % 2 === 0 ){
                    $priceIs .= "</div>";
                    $priceIs .= "<div style='margin-top: 10px; padding: 10px 10px 10px 10px; border: 1px solid #0c2461;'>";
                    $div_design++;
                }

                $priceIs .="<strong>". str_replace("client_commision_","Your Commission, When Registering the Guest in the ", $k)." Plan : ".$v."</strong><br/>";
            }


            // end the price table as client Recommanded Way...

        }

        $html = "
        <style>
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #4CAF50;
          color: white;
        }
        </style>
        <table id='customers'>
        <tr>
          <td>Affiliate Person Name</td>
          <td>$name</td>
        </tr>
        <tr>
          <td>Affiliate Person Email</td>
          <td>$email</td>
        </tr>
        <tr>
          <td>Affiliate Person Identity</td>
          <td>$identity_num</td>
        </tr>
        <tr>
          <td>Affiliate Link</td>
          <td>$affiliate_link</td>
        </tr>
        <tr>
          <td>Price</td>
          <td>$priceIs</td>
        </tr>
        <tr>
          <td>Valid time</td>
          <td>$valid_time_limit</td>
        </tr>
        <tr>
          <td>My total Affilaite Commission</td>
          <td>$total_client_commission</td>
        </tr>
        <tr>
          <td>My Total Affiliate User Number</td>
          <td>$total_affiliate_num</td>
        </tr>
        <tr>
          <td>Created At</td>
          <td>$created_at</td>
        </tr>
        </table>
        ";

        // echo $html;

        /*=============================================
        =            Arafat Send the Email            =
        =============================================*/

        $customerEmail = $email;

        # Sending Mail using Arafat Model
        MailModel::mailSend($customerEmail, "Affilite Information", $html);

 /*       $res = Mail::send([], [],function ($message) use ($customerEmail,$html) {
           $message->from('info@guarantaccess.com','guarantaccess');
           $message->subject("Affilite Information");
           $message->setBody($html, 'text/html');
           $message->to($customerEmail);
        });
*/
        Session::flash("message", "Email Send Successfull !");
        return redirect()->route("listAffiliatePerson");

        /*=====  End of Arafat Send the Email  ======*/

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
     * date: 09/11/2020
     * affiliateTotalIndividualPackageGuestForPerson
     * @author arafat | arafat.dml@gmail.com
     * @return array of Name of the package and
     * array value is the total IndividualPackageGuest
     * of the AffiliateType,
     */
    public function affiliateTotalIndividualPackageGuestForPerson($personId){
        $affiliateTypes = affiliateType::get();
        $individualPackageTotal = array();
        if(@$affiliateTypes){
            foreach ($affiliateTypes as $key => $affiliateType) {
                $affiliateTypeId = $affiliateType->id;
                $packageName = str_replace(" ", "_", $affiliateType->name);
                $totalAffiliateForPackage = affiliateTracking::where("affiliate_person_id", $personId)->where("guest_select_package_id", $affiliateTypeId)->get();
                $individualPackageTotal[$packageName] = $totalAffiliateForPackage->count();
            }
        }
        return $individualPackageTotal;
    }


    /**
     * date: 10/11/2020
     * affiliatePersonPage
     * @author arafat | arafat.dml@gmail.com
     * For ForntEnd Showing
     */
    public function affiliatePersonPage(){
        $affiliatePersons = affiliatePerson::get();

        $AffiGuestTotalIndiviPackage = array();
        // for now we will not use it ... in future we will use it ...
        $validTimelimitArr = array();
        if(@count($affiliatePersons)){
            foreach($affiliatePersons as $key => $affiliatePerson){

                $validTimelimitArr[$key] = $this->affiliateValidTimeLimitCheck($affiliatePerson->valid_time_limit);

                $AffiGuestTotalIndiviPackage[$key] = $this->affiliateTotalIndividualPackageGuestForPerson($affiliatePerson->id);
            }
        }
        // dump($validTimelimitArr);
        // dump($AffiGuestTotalIndiviPackage);
        // dd($affiliatePersons);

        return view("affiliate.affiliatePersonFrontPage.affiliatePersonFrontPage", compact('validTimelimitArr', 'AffiGuestTotalIndiviPackage', 'affiliatePersons'));
    }

    /**
     * date: 10/11/2020
     * affiliatePersonPageSearch
     * @author arafat | arafat.dml@gmail.com
     * For ForntEnd SearchResultPage
     */
    public function affiliatePersonPageSearch(Request $request){
        // GET is not Allowed So redirect it
        if($request->method() == "GET"){
            return redirect()->route("affiliatePersonPage");
        }
        // dd($request);
        $identity_num = $request->unique_id;
        $email = $request->email;
        $name = $request->name;
        Session::flash("msg", "showing Search Result");
        $affiliatePersons = NULL;
        if( !empty($identity_num) && !empty($email) && !empty($name)  ){
            // search operations
            $affiliatePersons = affiliatePerson::where("name", $name)
                                                ->where("identity_num", $identity_num)
                                                ->where("email", $email)
                                                ->get();
        }else if(!empty($identity_num) && !empty($email)){
            // search operations
            $affiliatePersons = affiliatePerson::where("identity_num", $identity_num)
                                                ->where("email", $email)
                                                ->get();
        }else if(!empty($identity_num) && !empty($name)){
            // search operations
            $affiliatePersons = affiliatePerson::where("identity_num", $identity_num)
                                                ->Where("name", $name)
                                                ->get();
        }else if(!empty($email) && !empty($name)){
            // search operations
            $affiliatePersons = affiliatePerson::where("email", $email)
                                                ->Where("name", $name)
                                                ->get();
        }else if(empty($email) && empty($name)){
            // search operations
            $affiliatePersons = affiliatePerson::where("identity_num", $identity_num)
                                                ->get();
        }else if(empty($email) && empty($identity_num)){
            // search operations
            $affiliatePersons = affiliatePerson::where("name", $name)
                                                ->get();
        }else if(empty($name) && empty($identity_num)){
            // search operations
            $affiliatePersons = affiliatePerson::where("email", $email)
                                                ->get();
        }

        // dd($affiliatePersons);
        $AffiGuestTotalIndiviPackage = array();
        // for now we will not use it ... in future we will use it ...
        $validTimelimitArr = array();
        if(@count($affiliatePersons)){
            foreach($affiliatePersons as $key => $affiliatePerson){

                $validTimelimitArr[$key] = $this->affiliateValidTimeLimitCheck($affiliatePerson->valid_time_limit);

                $AffiGuestTotalIndiviPackage[$key] = $this->affiliateTotalIndividualPackageGuestForPerson($affiliatePerson->id);
            }
        }
        // dump($validTimelimitArr);
        // dump($AffiGuestTotalIndiviPackage);
        // dd($affiliatePersons);

        return view("affiliate.affiliatePersonFrontPage.affiliatePersonFrontPage", compact('validTimelimitArr', 'AffiGuestTotalIndiviPackage', 'affiliatePersons'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $affiliateTypes = affiliateType::get();
        return view("affiliate.affiliatePerson.affiliatePersonCreate", compact("affiliateTypes"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $valid_time_limit = get_valid_time_limit($request);
        $random_eight_digit = Str::random(8);
        $data = array(
            "name" => $request->affiliate_person_name,
            "email" => $request->affiliate_person_email,
            "identity_num" => $random_eight_digit,
            "affiliate_link" => str_replace(" ", "", $request->affiliate_person_name)."_".$random_eight_digit,
            "price" => json_encode(array(
                "client_commision_basic" => $request->client_commision_Basic,
                "guest_discount_basic" => $request->guest_discount_Basic,
                "client_commision_business" => $request->client_commision_Business,
                "guest_discount_business" => $request->guest_discount_Business,
                "client_commision_premium" => $request->client_commision_Premium,
                "guest_discount_premium" => $request->guest_discount_Premium,
            )),
            "valid_time_limit" => $valid_time_limit,
            'type'  => 'person'
        );

        // create the data ..
        $res = affiliatePerson::create($data);
        if($res){
            Session::flash("message", "Created Successfully");
        }else{
            Session::flash("message", "Oops! Something Went wrong . Failed");
        }

        return redirect()->route("listAffiliatePerson");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\affiliatePerson  $affiliatePerson
     * @return \Illuminate\Http\Response
     */
    public function show(affiliatePerson $affiliatePerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\affiliatePerson  $affiliatePerson
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Session::put("update_id", (int) $id);
        $affiliateTypes = affiliateType::get();
        $affiliatePerson  = affiliatePerson::find((int)$id);

        return view("affiliate.affiliatePerson.affiliatePersonEdit", compact("affiliateTypes", "affiliatePerson"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\affiliatePerson  $affiliatePerson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, affiliatePerson $affiliatePerson)
    {
        // dd($request);
        $update_id = Session::get("update_id");
        $valid_time_limit = get_valid_time_limit($request);
        $random_eight_digit = Str::random(8);
        $data = array(
            "name" => $request->affiliate_person_name,
            "email" => $request->affiliate_person_email,
            "identity_num" => $random_eight_digit,
            "affiliate_link" => str_replace(" ", "", $request->affiliate_person_name)."_".$random_eight_digit,
            "price" => json_encode(array(
                "client_commision_basic" => $request->client_commision_Basic,
                "guest_discount_basic" => $request->guest_discount_Basic,
                "client_commision_business" => $request->client_commision_Business,
                "guest_discount_business" => $request->guest_discount_Business,
                "client_commision_premium" => $request->client_commision_Premium,
                "guest_discount_premium" => $request->guest_discount_Premium,
            )),
            "valid_time_limit" => $valid_time_limit,
        );

       // create the data ..
       $res = affiliatePerson::where("id", $update_id)->update($data);
       if($res){
           Session::flash("message", "Updated Successfully");
       }else{
           Session::flash("message", "Oops! Something Went wrong . Update Failed");
       }

        return redirect()->route("listAffiliatePerson");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\affiliatePerson  $affiliatePerson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = affiliatePerson::destroy((int) $id);
        if($res){
            Session::flash("message", "Record Deleted Successfully");
        }else{
            Session::flash("message", "Oops! Something Went wrong . Delete Failed");
        }

        return redirect()->route("listAffiliatePerson");
    }
}
