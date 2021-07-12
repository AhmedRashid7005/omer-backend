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

use App\Admin\Coupon;


class CouponController extends Controller
{
   public function couponList(){

    $couponList = Coupon::get();

    if($couponList){
        $couponList = $couponList->toArray();
    }

    return view("admin.coupon.couponList", compact("couponList"));

   }


   public function couponAdd(){

    return view("admin.coupon.couponAdd");
   }

   public function couponStore(Request $request){
        // dd($request);

        $data = array(
            "coupon_code" => $request->coupon_code,
            "description" => $request->description,
            "amount_type" => $request->amount_type,
            "amount" => $request->amount,
            "expiry_date" => $request->expiry_date,
            "minimum_spend" => $request->minimum_spend,
            "maximum_spend" => $request->maximum_spend,
            "use_limit_per_coupon" => $request->use_limit_per_coupon,
            "use_limit_per_user" => $request->use_limit_per_user,
        );

        $res = Coupon::create($data);

        if($res){
            HelperModel::flash("Coupon Create Successfully", "success");
        }else{
            HelperModel::flash("Coupon Create Failed", "danger");

        }

        return redirect()->route("couponList");
   }

   public function couponEdit($id = NULL){
    
    $id = (int) $id;

    $coupon = Coupon::find($id);

    return view("admin.coupon.couponEdit", compact("coupon"));

   }

   public function couponUpdate(Request $request){
        
        // dd($request);

        $id = (int) $request->id;

        $data = array(
            "coupon_code" => $request->coupon_code,
            "description" => $request->description,
            "amount_type" => $request->amount_type,
            "amount" => $request->amount,
            "expiry_date" => $request->expiry_date,
            "minimum_spend" => $request->minimum_spend,
            "maximum_spend" => $request->maximum_spend,
            "use_limit_per_coupon" => $request->use_limit_per_coupon,
            "use_limit_per_user" => $request->use_limit_per_user,
        );

        $res = Coupon::where("id", $id)->update($data);

        if($res){
            HelperModel::flash("Coupon Updated Successfully", "success");
        }else{
            HelperModel::flash("Coupon Updated Failed", "danger");

        }

        return redirect()->route("couponList");
   }


   public function couponDelete($id = NULL){

    $id = (int ) $id;

    $res = Coupon::where("id", $id)->delete();

    if($res){
        HelperModel::flash("Coupon Deleted Successfully", "success");
    }else{
        HelperModel::flash("Coupon Deleted Failed", "danger");

    }

    return redirect()->route("couponList");

   }



}
