<?php

namespace App\Http\Controllers\Admin;
use App\Admin\BrandType;
use App\HelperModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


class BrandTypeController extends Controller
{

	public function brandTypeList(){
		$brandTypeList = BrandType::get();
		
		if( $brandTypeList ){

			$brandTypeList = $brandTypeList->toArray(); 
		}

		return view("admin.brandType.brandTypeList", compact("brandTypeList"));
	}

    public function brandTypeAdd(){

    	return view("admin.brandType.brandTypeAdd");
    }

    public function brandTypeStore(Request $request){
    	// dd($request);

    	$data = array();
    	$res = false;

    	if( is_array( $request->brand_type ) ){

    		foreach ($request->brand_type as $k => $v) {
				$data = array(
					"brand_type" => $v,
				);
				$res = BrandType::create($data); 			
    		}
    	}

    	if( $res ){
    		HelperModel::flash("Data Added Successfull", "success");
    	}else{
    		HelperModel::flash("Data Added Failed", "danger");
    	}

    	return redirect()->route("brandTypeList");
    }

    public function brandTypeEdit($id = NULL){
    	$id = (int) $id;

    	$brandType = BrandType::find($id);

    	return view("admin.brandType.brandTypeEdit", compact('brandType'));
    }

    public function brandTypeUpdate(Request $request){
    	// dd($request);

    	$id = $request->id;
    	$data = array(
    		"brand_type" => $request->brand_type,
    	);

    	$res = BrandType::where("id", $id)->update($data);

    	if( $res ){
    		HelperModel::flash("Data Updating Successfull", "success");
    	}else{
    		HelperModel::flash("Data Updating Failed", "danger");
    	}

    	return redirect()->route("brandTypeList");

    }

    public function brandTypeDelete($id = NULL){
    	$id = (int) $id;

    	$res = BrandType::where("id", $id)->delete();

    	if( $res ){
    		HelperModel::flash("Data Delation Successfull", "success");
    	}else{
    		HelperModel::flash("Data Delation Failed", "danger");
    	}

    	return redirect()->route("brandTypeList");

    }

}
