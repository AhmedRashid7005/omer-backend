<?php

namespace App\Http\Controllers\Admin;

use App\Admin\ImageVideoService;
use App\Admin\OtherService;
use App\HelperModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{

    public function imageServiceList(){

    	$listArray = array();

    	$list = ImageVideoService::where("service_for", "image")->with("subscriberPackageName")->get();
    	// dd($list);

    	if(@count($list)){

    		foreach ($list as $k => $v) {
    			
    			$listArray[$k] = array(

    				"id" => $v->id,
    				"subscriberPackageName" => $v->subscriberPackageName->name,
    				"service_type" => $v->service_type,
    				"from" => $v->from,
    				"to" => $v->to,
    				"price" => $v->price,
    				"created_at" => $v->created_at,

    			);
    		}
    	}

    	// dd($listArray);

    	return view("admin.service.imageServiceList", compact("listArray"));

    }

   	public function videoServiceList(){

   		$listArray = array();

   		$list = ImageVideoService::where("service_for", "video")->with("subscriberPackageName")->get();
   		// dd($list);

   		if(@count($list)){

   			foreach ($list as $k => $v) {
   				
   				$listArray[$k] = array(

   					"id" => $v->id,
   					"subscriberPackageName" => $v->subscriberPackageName->name,
   					"service_type" => $v->service_type,
   					"from" => $v->from,
   					"to" => $v->to,
   					"price" => $v->price,
   					"created_at" => $v->created_at,

   				);
   			}
   		}

   		// dd($listArray);

   		return view("admin.service.videoServiceList", compact("listArray"));
   	}

   	public function otherServiceList(){
   		
   		$listArray = array();

   		$list = OtherService::with("subscriberPackageName")->get();
   		// dd($list);
   		
   		if($list){

   			foreach ($list as $k => $v) {
   				
   				$listArray[$k] = array(

   					"id" => $v->id,
   					"subscriberPackageName" => $v->subscriberPackageName->name,
   					"name" => $v->name,
   					"description" => $v->description,
   					"price" => $v->price,
   					"type" => $v->type,
   					"created_at" => $v->created_at,

   				);

   			}

   		}

   		return view("admin.service.otherServiceList", compact("listArray"));

   	}

   	public function imageVideoServiceAdd(){
   		$subscriber_package_name_id = HelperModel::get_subscriber_package_list();

   		return view("admin.service.imageVideoServiceAdd", compact("subscriber_package_name_id"));
   	}

   	public function imageVideoServiceStore(Request $request){
   		// dd($request);

   		$loop_ln = @count($request->service_for);

   		for($i = 0; $i < $loop_ln; $i++){

   			$data = array(
   				"service_for" => $request->service_for[$i],
   				"service_type" => $request->service_type[$i],
   				"from" => $request->from[$i],
   				"to" => $request->to[$i],
   				"price" => $request->price[$i],
   				"subscriber_package_name_id" => $request->subscriber_package_name_id,
   			);

   			# Store the Db In the Database ..

   			$res = ImageVideoService::create($data);
   		}

   		HelperModel::defaultFlash($res);

   		return redirect()->route("imageVideoServiceAdd");

   	}

   	public function imageVideoServiceEdit($id = NULL){

   		$id = (int) $id;

   		$data = ImageVideoService::find($id);

   		$subscriber_package_name_id = HelperModel::get_subscriber_package_list();

   		return view("admin.service.imageVideoServiceEdit", compact("subscriber_package_name_id", "data"));

   	}

   	public function imageVideoServiceUpdate(Request $request){
   		// dd($request);

   		$id = (int) $request->id;

   		$data = array(
   			"service_for" => $request->service_for,
   			"service_type" => $request->service_type,
   			"from" => $request->from,
   			"to" => $request->to,
   			"price" => $request->price,
   			"subscriber_package_name_id" => $request->subscriber_package_name_id,
   		);


   		$res = ImageVideoService::where("id", $id)->update($data);

   		# flash with Redirect 
   		HelperModel::defaultFlash($res, "updating");

   		

   		if(Session::get("redirect_to_ar") == "Image"){
   			return redirect()->route("imageServiceList");
   		}

   		return redirect()->route("videoServiceList");

   	}

   	public function imageVideoServiceDelete($id = NULL){
   		
   		$id = (int) $id;

   		$res = ImageVideoService::where("id", $id)->delete();

   		# flash with Redirect 
   		HelperModel::defaultFlash($res, "Delation");

   		return redirect()->back();

   	}

   	public function otherServiceAdd(){
   		$subscriber_package_name_id = HelperModel::get_subscriber_package_list();

   		$types = [
   		    'invoice' => 'invoice',
   		    'special' => 'special',
        ];
   		return view("admin.service.otherServiceAdd", compact("subscriber_package_name_id",'types'));
   	}

   	public function otherServiceStore(Request $request){
   		// dd($request);

   		$loop_ln = @count($request->name);

   		$data = array();

   		for($i = 0; $i < $loop_ln; $i++){
   			
   			$data = array(
   				"subscriber_package_name_id" => $request->subscriber_package_name_id[$i],
   				"name" => $request->name[$i],
   				"description" => $request->description[$i],
   				"price" => $request->price[$i],
   				"type" => $request->type,
   			);

   			$res = OtherService::create($data);
   		}

   		# flash with Redirect 
   		HelperModel::defaultFlash($res);

   		return redirect()->route("otherServiceList");

   	}

   	public function otherServiceEdit($id = NULL){

   		$id = (int) $id;

   		$data = OtherService::find($id);
   		
   		$subscriber_package_name_id = HelperModel::get_subscriber_package_list();

   		return view("admin.service.otherServiceEdit", compact("subscriber_package_name_id", "data"));

   	}

   	public function otherServiceUpdate(Request $request){
   		
   		// dd($request);

   		$id = (int) $request->id;

   		$data = array(
   			"subscriber_package_name_id" => $request->subscriber_package_name_id,
   			"name" => $request->name,
   			"description" => $request->description,
   			"price" => $request->price,
   		);

   		$res = OtherService::where("id", $id)->update($data);

   		# flash with Redirect 
   		HelperModel::defaultFlash($res, "Updating");

   		return redirect()->route("otherServiceList");

   	}

   	public function otherServiceDelete($id){
   		$id = (int) $id;

   		$res = OtherService::where("id", $id)->delete();

   		# flash with Redirect 
   		HelperModel::defaultFlash($res, "Delating");

   		return redirect()->route("otherServiceList");

   	}


}
