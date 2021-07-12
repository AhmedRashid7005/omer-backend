<?php

namespace App\Http\Controllers\Admin;

use App\Admin\ShippingCost;
use App\Admin\ShippingCostWeight;
use App\HelperModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShippingCostController extends Controller
{
	/**
	 *
	 * @author arafat | arafat.dml@gmail.com
	 * This Full intelligence Controller  
	 * ShippingCostController
	 * Reduce 66% of Work .
	 * Each Module is woring 3X work
	 *
	 */
	

	/**
	 *
	 * @author arafat | arafat.dml@gmail.com
	 * This will use for Add, Edit, List
	 *
	 */

	private function getValidDeliveryType($delivery_type = "international"){

		$validDeliveryType = array("international", "local_delivery", "local_receipt");

		# if we not found a valid delivery type then default is Internaional..
		if( !in_array($delivery_type, $validDeliveryType) ){
			$delivery_type = "international";
		}

		return $delivery_type;
	}


    public function InternationalShippingList($delivery_type = "international"){

    	$delivery_type = $this->getValidDeliveryType($delivery_type);

    	# -----------------------------------------
    	# This session data is used by details and
    	# Delete Module ....
    	Session::put("delivery_type", $delivery_type);
    	# -----------------------------------------
    	
    	$list = ShippingCost::with(["ShippingCostWeight", "SubscriberPackageName"])->where("delivery_type", $delivery_type)->get();

    	$listArray = $this->shippingListDataProcess($list);

    	return view("admin.shippingCost.internationalShippingList", compact("listArray", "delivery_type"));

    }

    private function shippingListDataProcess($list){

    	$listArray = array();

    	if(@count($list)){
    		foreach($list as $k => $v){

    			$listArray[$k]["id"] = $v->id;
    			$listArray[$k]["plan"] = $v->SubscriberPackageName->name;
    			$listArray[$k]["company_name"] = $v->company_name;
    			$listArray[$k]["shipping_form"] = $v->shipping_form;
    			$listArray[$k]["shipping_to"] = $v->shipping_to;
    			$listArray[$k]["delivery_method"] = $v->method;
    			$listArray[$k]["during_time"] = $v->during_time;
    			$listArray[$k]["created_at"] = $v->created_at;

    		}
    	}

    	return $listArray;

    }

    public function InternationalShippingAdd($delivery_type = "international"){

    	$subscriberPackageList = HelperModel::get_subscriber_package_list();

    	$delivery_type = $this->getValidDeliveryType($delivery_type);

    	return view("admin.shippingCost.internationalShippingAdd", compact("subscriberPackageList", "delivery_type"));
    }

    public function ShippingStore(Request $request){
    	// dd($request);

    	$data = array(
    		"delivery_type" => $request->delivery_type,
    		"subscriber_package_name_id" => $request->subscriber_package_name_id,
    		"company_name" => $request->company_name,
    		"shipping_form" => $request->shipping_form,
    		"shipping_to" => $request->shipping_to,
    		"method_type" => $request->method_type,
    		"method" => $request->method,
    		"during_time" => $request->during_time,
    	);

    	$res = ShippingCost::create($data);

    	if(@count($res)){

    		$ln = @count($request->weight_type);

    		for ($i=0; $i < $ln; $i++) { 
    			
    			# Generate the Data we need ..
    			$loopData = array(
    				"shipping_cost_id" => $res->id,
    				"weight_type" => $request->weight_type[$i],
    				"from" => $request->from[$i],
    				"to" => $request->to[$i],
    				"price_for" => $request->price_for[$i],
    				"price" => $request->price[$i],

    			);

    			# Insert the data ...
    			ShippingCostWeight::create($loopData);

    		}

    	}

    	# Falsh Message
    	HelperModel::defaultFlash($res);

    	# Redirect
    	return redirect()->route("InternationalShippingList",$request->delivery_type);

    }

   

    public function InternationalShippingEdit($id = NULL){


    	$id  = (int) $id;

    	$internationalShipping = ShippingCost::find($id);
    	// dd($internationalShipping);

    	$subscriberPackageList = HelperModel::get_subscriber_package_list();

    	$delivery_type = "international";

    	if(@count($internationalShipping)){
    		$delivery_type = $internationalShipping->delivery_type;
    	}

    	return view("admin.shippingCost.internationalShippingEdit", compact("subscriberPackageList", "internationalShipping", "delivery_type"));

    }

    public function ShippingUpdate(Request $request){
    	// dd($request);

    	$id = (int) $request->id;

    	$data = array(
    		"subscriber_package_name_id" => $request->subscriber_package_name_id,
    		"company_name" => $request->company_name,
    		"shipping_form" => $request->shipping_form,
    		"shipping_to" => $request->shipping_to,
    		"method_type" => $request->method_type,
    		"method" => $request->method,
    		"during_time" => $request->during_time,
    	);

    	$res = ShippingCost::where("id", $id)->update($data);

    	# Falsh Message
    	HelperModel::defaultFlash($res, "Updating");

    	# Redirect
    	return redirect()->route("InternationalShippingList",$request->delivery_type);

    }

    public function InternationalShippingDetails($id = NULL){
    	$id = (int) $id;

    	# -------------------------
    	# We will use it for add more weight
    	# And Also for Redirect

    	Session::put("shipping_cost_id", $id);
    	Session::put("shipping_details_route", "InternationalShippingDetails");

    	# -------------------------

    	$delivery_type = Session::get("delivery_type");

    	$shippingCost = ShippingCost::with(["ShippingCostWeight", "SubscriberPackageName"])->where("delivery_type", $delivery_type)->find($id);

    	// dd($shippingCost);

    	$shippingCostWeight = $subscriberPackageName = NULL;

    	if(@count($shippingCost)){

    		$shippingCostWeight 	= $shippingCost->ShippingCostWeight;
    		$subscriberPackageName 	= $shippingCost->SubscriberPackageName;

    		# Now Unset the Items..
    		unset($shippingCost->ShippingCostWeight);
    		unset($shippingCost->SubscriberPackageName);

    		# All Needed Converted to array ..

    		$shippingCost = $shippingCost->toArray();
    		$shippingCostWeight = $shippingCostWeight->toArray();
    		$subscriberPackageName = $subscriberPackageName->toArray();
    	}


    	return view("admin.shippingCost.internationalShippingDetails", compact("shippingCost", "shippingCostWeight", "subscriberPackageName", "delivery_type"));

    }

    public function ShippingAddMoreWeight(){
    	return view("admin.shippingCost.shippingAddMoreWeight");
    }

    public function ShippingAddMoreWeightStore(Request $request){
    	// dd($request);

    	$shipping_cost_id = Session::get("shipping_cost_id");
    	$shipping_details_route = Session::get("shipping_details_route");

    	$data = array(
    		"shipping_cost_id" => $shipping_cost_id,
    		"weight_type" => $request->weight_type,
    		"from" => $request->from,
    		"to" => $request->to,
    		"price_for" => $request->price_for,
    		"price" => $request->price,
    	);

    	$res = ShippingCostWeight::create($data);

    	# Flash Message
    	HelperModel::defaultFlash($res);

    	# Redirect ...
    	return redirect()->route($shipping_details_route, $shipping_cost_id);

    }

    public function ShippingWeightDelete ($id = NULL){
    	$id = (int) $id;

    	$res = ShippingCostWeight::where("id", $id)->delete();

    	# Flash
    	HelperModel::defaultFlash($res, "Delating");

    	#redirect
    	$shipping_cost_id = Session::get("shipping_cost_id");
    	$shipping_details_route = Session::get("shipping_details_route");
    	return redirect()->route($shipping_details_route, $shipping_cost_id);

    }

    public function ShippingDelete ($id = NULL){
    	$id = (int) $id;

    	$res = ShippingCost::where("id", $id)->delete();

    	# We need also delete the weights table data

    	if($res){

    		$res = ShippingCostWeight::where("shipping_cost_id", $id)->delete();

    	}

    	# Flash
    	HelperModel::defaultFlash($res, "Delating");

    	# Redirect 
    	$delivery_type = Session::get("delivery_type");

    	return redirect()->route("InternationalShippingList",$delivery_type);

    }



}
