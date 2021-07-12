<?php

namespace App\Http\Controllers;

use App\affiliateTracking;
use App\affiliateType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
     * affiliateUserProfile
     * @author arafat arafat.dml@gmail.com
     */
    public function affiliateUserProfile($packAgeName){
        $affiliateType = affiliateType::with(["affiliateGroup"])->where("name", $packAgeName)->first();
        // dump($affiliateType);
        if(@count($affiliateType->affiliateGroup)){
            foreach($affiliateType->affiliateGroup as $key =>$affGroup ){
                // if the function inside if return true then return it
                if( $this->affiliateValidTimeLimitCheck($affGroup->valid_time_limit) ){
                   return $affGroup;
                }
            }
            return false;
        }
    }

    /**
     * date: 09/11/2020
     * affiliateTotalIndividualPackageGuestForAuthUser
     * @author arafat | arafat.dml@gmail.com
     * @return array of Name of the package and
     * array value is the total IndividualPackageGuest
     * of the AffiliateType,
     */
    public function affiliateTotalIndividualPackageGuestForAuthUser(){
        $authUserId = Auth()->user()->id;
        $affiliateTypes = affiliateType::get();
        $individualPackageTotal = array();
        if(@$affiliateTypes){
            foreach ($affiliateTypes as $key => $affiliateType) {
                $affiliateTypeId = $affiliateType->id;
                $packageName = str_replace(" ", "_", $affiliateType->name);
                $totalAffiliateForPackage = affiliateTracking::where("client_id", $authUserId)->where("guest_select_package_id", $affiliateTypeId)->get();
                $individualPackageTotal[$packageName] = $totalAffiliateForPackage->count();
            }
        }
        return $individualPackageTotal;
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // arafat
        $individualPackgetotalAffiliate = $this->affiliateTotalIndividualPackageGuestForAuthUser();
        // add by arafat arafat.dml@gmail.com
        $loginUserPackage   = Auth()->user()->mem_package;
        $affiliateGroup     = $this->affiliateUserProfile($loginUserPackage);
        // end add by arafat arafat.dml@gmail.com
        // dump($loginUserPackage);
        // dump($affiliateGroup);
        // dump($individualPackgetotalAffiliate);
        return view('home', compact('affiliateGroup', 'individualPackgetotalAffiliate'));
    }
}
