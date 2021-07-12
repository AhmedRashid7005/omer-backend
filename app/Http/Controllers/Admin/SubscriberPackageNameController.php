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


class SubscriberPackageNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subscribePackageList()
    {
        $subscribePackageLists = SubscriberPackageName::orderBy("display_position")->get();

        if( $subscribePackageLists ){
            $subscribePackageLists = $subscribePackageLists->toArray();
        }
        // dd($subscribePackageLists);
        return view("admin.SubscriberPackageName.SubscriberPackageNameList", compact('subscribePackageLists'));
    }

    public function subscribePackageCreate()
    {
        return view("admin.SubscriberPackageName.SubscriberPackageNameAdd");
    }

    public function subscribePackageStore(Request $request)
    {
        // dd($request);

        $data = array(
            "name" => $request->name,
            "arabic_name" => $request->arabic_name,
            "price_in_dolar" => $request->price_in_dolar,
            "price_in_saudi_riyal" => $request->price_in_saudi_riyal,
            "number_of_days" => $request->number_of_days,
            "suit_identity" => $request->suit_identity,
            "display_position" => $request->display_position,
            "created_at" => Carbon::now(),
        );

        $res = SubscriberPackageName::create($data);

        if( $res ){

            HelperModel::flash("Data Created Successfull", "primary");
        }else{

            HelperModel::flash("Data Created Failed", "danger");
        }

        return redirect()->route("subscribePackageList");
    }

    public function subscribePackageEdit($id)
    {
        $subscribePackage = SubscriberPackageName::find($id);
        // dd($subscribePackage);

        return view("admin.SubscriberPackageName.SubscriberPackageNameEdit", compact('subscribePackage'));

    }

    public function subscribePackageUpdate(Request $request)
    {
       // dd($request);

       $data = array(
           "name" => $request->name,
           "arabic_name" => $request->arabic_name,
           "price_in_dolar" => $request->price_in_dolar,
           "price_in_saudi_riyal" => $request->price_in_saudi_riyal,
           "number_of_days" => $request->number_of_days,
           "suit_identity" => $request->suit_identity,
           "display_position" => $request->display_position,
           "updated_at" => Carbon::now(),
       );

       $id = $request->id;

       $res = SubscriberPackageName::where("id", $id)->update($data);

       if( $res ){

           HelperModel::flash("Data Update Successfull", "primary");
       }else{

           HelperModel::flash("Data Update Failed", "danger");
       }

       return redirect()->route("subscribePackageList");


    }


    public function subscribePackageDelete($id)
    {
        $id = (int) $id;

        # First 3 Package Not deleteAble we are using this Hardcoded id 
        # In other Modules Thats why you can not Delete It Buddy

        $shouldNotDeleteIds = array(1,2,3);

        if( in_array($id, $shouldNotDeleteIds) ){
          HelperModel::flash("You can Not Delete This Core Package, This Package Is Use by many Hard coded Module", "danger");
        }else{

          $res = SubscriberPackageName::where("id", $id)->delete();

          if( $res ){

              HelperModel::flash("Data Delete Successfull", "primary");
          }else{

              HelperModel::flash("Data Delete Failed", "danger");
          }

        }        

        return redirect()->route("subscribePackageList");
    }



    
}
