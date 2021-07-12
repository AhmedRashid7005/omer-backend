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
use App\Admin\SuitAddress;


class SuitAddressController extends Controller
{

   public function suitAddressList(){

        $suitAddressLists = SuitAddress::get();

        if( $suitAddressLists ){

            $suitAddressLists = $suitAddressLists->toArray();
        }

        // dd( $suitAddressLists );

        return view("admin.suitAddress.suitAddressList", compact("suitAddressLists"));

   }

   public function suitAddressCreate(){

        return view("admin.suitAddress.suitAddressAdd");

    }


   public function suitAddressStore(Request $request){
        
        $data = array(
            "name" => $request->name,
            "country" => $request->country,
            "address" => $request->address,
            "address2" => $request->address2,
            "state" => $request->state,
            "city" => $request->city,
            "zip_code" => $request->zip_code,
            "house_road_number" => $request->house_road_number,
            "phone" => $request->phone,
            "note" => $request->note,
            "status" => $request->status,
            "updated_at" => Carbon::now(),
        );

        $res = SuitAddress::create($data);

        if( $res ){

            HelperModel::flash("Suit Address Created Successfull", "primary");
        }else{

            HelperModel::flash("Suit Address Created Failed", "danger");
        }

        return redirect()->route("suitAddressList");
    
   }

   public function suitAddressEdit($id = NULL){

        if(!$id){
            $id = NULL;
        }else{
            $id = (int) $id;
        }

        $suitAddress = SuitAddress::find($id);

        // dd($suitAddress);

        return view("admin.suitAddress.suitAddressEdit", compact("suitAddress"));
   }

   public function suitAddressUpdate(Request $request){
        // dd($request);

        $id = (int) $request->id;

        $data = array(
            "country" => $request->country,
            "address" => $request->address,
            "address2" => $request->address2,
            "state" => $request->state,
            "city" => $request->city,
            "zip_code" => $request->zip_code,
            "house_road_number" => $request->house_road_number,
            "phone" => $request->phone,
            "note" => $request->note,
            "status" => $request->status,
            "updated_at" => Carbon::now(),
        );

        $res = SuitAddress::where("id", $id)->update($data);

        if( $res ){

            HelperModel::flash("Suit Address Update Successfull", "primary");
        }else{

            HelperModel::flash("Suit Address Update Failed", "danger");
        }

        return redirect()->route("suitAddressList");

   }

   public function suitAddressDelete($id){
     
     $id = (int) $id;
     $res = SuitAddress::where("id", $id)->delete();

     if( $res ){

         HelperModel::flash("Suit Address Delete Successfull", "primary");
     }else{

         HelperModel::flash("Suit Address Delete Failed", "danger");
     }

     return redirect()->route("suitAddressList");
    
   }


}
