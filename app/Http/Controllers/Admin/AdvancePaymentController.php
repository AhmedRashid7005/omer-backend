<?php

namespace App\Http\Controllers\Admin;

use App\Admin\AdvancePayment;
use App\HelperModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvancePaymentController extends Controller
{
    
	public function AdvancePaymentList(){
		$listArray = array();

		$list = AdvancePayment::with("SubscriberPackageName")->get();

		if(@count($list)){

			foreach ($list as $k => $v) {
				
				$listArray[$k]["id"] = $v->id;
				$listArray[$k]["plan"] = $v->SubscriberPackageName->name;
				$listArray[$k]["order_type"] = $v->order_type;
				$listArray[$k]["percentage_of_defferred_amount"] = $v->percentage_of_defferred_amount;
				$listArray[$k]["percentage_added_in_deferred_amount"] = $v->percentage_added_in_deferred_amount;
				$listArray[$k]["created_at"] = $v->created_at;

			}

		}

		return view("admin.advancePayment.advancePaymentList", compact("listArray"));
	}

	public function AdvancePaymentAdd(){
		
		$subscriberPackageList = HelperModel::get_subscriber_package_list();

		return view("admin.advancePayment.advancePaymentAdd", compact("subscriberPackageList"));
	}

	public function AdvancePaymentStore(Request $request){
		// dd($request);

		$data = array(
			"subscriber_package_name_id" => $request->subscriber_package_name_id,
			"order_type" => $request->order_type,
			"percentage_of_defferred_amount" => $request->percentage_of_defferred_amount,
			"percentage_added_in_deferred_amount" => $request->percentage_added_in_deferred_amount,
		);

		$res = AdvancePayment::create($data);

		# falsh
		HelperModel::defaultFlash($res);

		# redirect
		return redirect()->route("AdvancePaymentAdd");

	}

	public function AdvancePaymentEdit($id = NULL){

		$id = (int) $id;

		$data  = AdvancePayment::find($id);
		
		$subscriberPackageList = HelperModel::get_subscriber_package_list();

		return view("admin.advancePayment.advancePaymentEdit", compact("subscriberPackageList", "data"));
	}

	public function AdvancePaymentUpdate(Request $request){
		// dd($request);

		$id = (int) $request->id;

		$data = array(
			"subscriber_package_name_id" => $request->subscriber_package_name_id,
			"order_type" => $request->order_type,
			"percentage_of_defferred_amount" => $request->percentage_of_defferred_amount,
			"percentage_added_in_deferred_amount" => $request->percentage_added_in_deferred_amount,
		);

		$res = AdvancePayment::where("id", $id)->update($data);

		# falsh
		HelperModel::defaultFlash($res, "Updating");

		# redirect
		return redirect()->route("AdvancePaymentList");

	}

	public function AdvancePaymentDelete($id = NULL){
		$id = (int) $id;

		$res = AdvancePayment::where("id", $id)->delete();

		# falsh
		HelperModel::defaultFlash($res, "Delating");

		# redirect
		return redirect()->route("AdvancePaymentList");

	}


}
