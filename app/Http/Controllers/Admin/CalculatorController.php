<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Calculator;
use App\HelperModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calculatorList($moduleName = "commission_fess", $for = "broker"){

    	$listArray = array();

        # We have a odd module cash_back ... 
        # This line is for support that module

        if($moduleName == "cash_back"){

            $list = Calculator::with("SubscriberPackageName")->where("module_name", $moduleName)->get();

        }else{

            $list = Calculator::with("SubscriberPackageName")->where("module_name", $moduleName)->where("module_for", $for)->get();
        }

    	

    	// dd($list);

    	if(@count($list)){

    		foreach ($list as $k => $v) {
    			
    			$listArray[$k]["id"] = $v->id;
    			$listArray[$k]["plan"] = $v->SubscriberPackageName->name;
                
                # We have a odd module cash_back ... 
                # This line is for support that module
                if($moduleName == "cash_back"){
                    $listArray[$k]["pay_via"] = $v->module_for;
                }

    			$listArray[$k]["from"] = $v->data_from;
    			$listArray[$k]["to"] = $v->data_to;
    			$listArray[$k]["amount_type"] = $v->amount_type;
    			$listArray[$k]["amount"] = $v->amount;
    			$listArray[$k]["created_at"] = $v->created_at;
    		}

    	}

		return view("admin.calculator.calculatorList", compact("listArray", "moduleName", "for"));    	
    }

    public function calculatorAdd($moduleName = "commission_fess", $for = "broker", $title = "Commion Fee for Broker"){

    	$subscriberPackageList = HelperModel::get_subscriber_package_list();

    	return view("admin.calculator.calculatorAdd", compact("subscriberPackageList", "moduleName", "for", "title"));
    }

    public function calculatorStore(Request $request){
    	// dd($request);

    	$data = array(
    		
    		"module_name" => $request->module_name,
    		"module_for" => $request->module_for,
    		"subscriber_package_name_id" => $request->subscriber_package_name_id,
    		"data_from" => $request->from,
    		"data_to" => $request->to,
    		"amount_type" => $request->amount_type,
    		"amount" => $request->amount,

    	);

    	# Data Create
    	$res = Calculator::create($data);

    	# Flash Message
    	HelperModel::defaultFlash($res);

    	# Redirect
    	# Redirect to re-form it is the CLient Requirement ....

        $title = str_replace("_", " ", $request->module_name)." ".str_replace("_", " ", $request->module_for);

    	return redirect()->route("calculatorAdd",[$request->module_name, $request->module_for, $title]);

    }

    public function calculatorEdit($id = NULL){
    	$id = (int) $id;

    	$data = Calculator::find($id);
    	// dd($data);

    	$moduleName = $for = $title = NULL;

    	if(@count($data)){
    		$moduleName = $data->module_name;
    		$for = $data->module_for;
    		$title = str_replace("_", " ", $moduleName)." ".str_replace("_", " ", $for);
    	}

    	$subscriberPackageList = HelperModel::get_subscriber_package_list();

    	return view("admin.calculator.calculatorEdit", compact("subscriberPackageList", "moduleName", "for", "title", "data"));

    }

	public function calculatorUpdate(Request $request){
		// dd($request);

		$id = (int) $request->id;

		$data = array(

			"subscriber_package_name_id" => $request->subscriber_package_name_id,
			"data_from" => $request->from,
			"data_to" => $request->to,
			"amount_type" => $request->amount_type,
			"amount" => $request->amount,

		);

        # We have a odd module cash_back ... 
        # This line is for support that module
        if($request->module_name == "cash_back"){
           $data["module_for"] = $request->module_for;
        }

		# Data Create
		$res = Calculator::where("id", $id)->update($data);

		# Flash Message
		HelperModel::defaultFlash($res, "Updating");

		# Redirect
		# Redirect to re-form it is the CLient Requirement ....
		return redirect()->route("calculatorList",[$request->module_name, $request->module_for]);

	}

	public function calculatorDelete($id = NULL){
		
		$id = (int) $id;

		$data = Calculator::find($id);

		$moduleName = $for  = NULL;

		if(@count($data)){
			$moduleName = $data->module_name;
			$for = $data->module_for;
		}

		# Data Create
		$res = Calculator::where("id", $id)->delete();

		# Flash Message
		HelperModel::defaultFlash($res, "Delating");

		# Redirect
		# Redirect to re-form it is the CLient Requirement ....
		return redirect()->route("calculatorList",[$moduleName, $for]);

	}


}
