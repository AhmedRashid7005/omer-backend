<?php

namespace App\Http\Controllers\Admin;
use App\Admin\Brand;
use App\Admin\BrandType;
use App\Admin\Image;
use App\HelperModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function brandList(){

    	$newBrandArr = array();

    	$brands = Brand::with(['brandType', "images"=> function($query){
    		$query->where("module_name", "BrandController");
    	}])->get();

    	// dd($brands);

    	if( $brands ){

    		$brands = $brands->toArray();
    	}

    	// dd($brands);

    	# Now we need Process the Image
    	# We need to set the array key not image

    	# ---------------------------------------

    	# At least one multi array
    	if( $brands && is_array( $brands[0]["images"] ) ){

    		foreach( $brands as $k => $v ){

    			$imgArray = array();
    			
    			foreach ($v["images"] as $kk => $vv) {
    				// dump($vv["img"]);

    				$imgArray[] = HelperModel::imageTagAdding( $vv["img"] );
    			}

    			# renmove it form array 
    			unset( $brands[$k]["images"] );
    			# remove Brand Type
    			unset( $brands[$k]["brand_type"] );

    			# add the image to the array
    			# Make the array to string
    			$imgStr = implode(" ", $imgArray);

    			# Now Rrwrite the Array
    			$newBrandArr[$k]["id"] = $v["id"];
    			$newBrandArr[$k]["brand_type_id"] = $v["brand_type"]["brand_type"];
    			$newBrandArr[$k]["country"] = $v["country"];
    			$newBrandArr[$k]["link"] = $v["link"];
    			$newBrandArr[$k]["allImg"] = $imgStr;
    			$newBrandArr[$k]["code"] = $v["code"];
    			$newBrandArr[$k]["created_at"] = $v["created_at"];
    			$newBrandArr[$k]["updated_at"] = $v["updated_at"];

    		}

    	}

    	// dd($brands);
    	// dd($newBrandArr);

    	# ---------------------------------------


    	return view("admin.brand.brandList", compact("newBrandArr"));
    }

    private function brandTypeList(){
    	$brandType = BrandType::get();

    	$brandType = HelperModel::make_list($brandType, "brand_type");
    	// dd($brandType);

    	return $brandType;
    }

    public function brandAdd(){
    	$brandTypeList = $this->brandTypeList();
    	return view("admin.brand.brandAdd", compact("brandTypeList"));
    }

    public function brandStore(Request $request){
    	// dd($request);

    	# We can not add add More feature
    	# Because we are using multiple image upload
    	# Feature

    	$data = array(
    		"brand_type_id" => $request->brand_type_id,
    		"country" => $request->country,
    		"link" => $request->link,
    		"code" => $request->code,
    	);


    	# Save the data
    	$res = Brand::create($data);

    	# Check if File Submitted
    	if($request->hasFile('image') && $res){ 

    		HelperModel::uploadToImageModule($request, "image", "imageModule", "BrandController", $res->id);
    	}
    
    	if( $res ){
    		HelperModel::flash("Data Creation Successfull", "success");
    	}else{
    		HelperModel::flash("Data Creation Failed", "danger");
    	}

    	return redirect()->route("brandList");


    }

    public function brandEdit($id = NULL){
    	$id = (int) $id;

    	$brand = Brand::find($id);

    	// dd($brand);

    	$brandTypeList = $this->brandTypeList();

    	return view("admin.brand.brandEdit", compact("brand", "brandTypeList"));
    }

    public function brandUpdate(Request $request){
    	// dd($request);

    	$id = (int) $request->id;

    	$data = array(
    		"brand_type_id" => $request->brand_type_id,
    		"country" => $request->country,
    		"link" => $request->link,
    		"code" => $request->code,
    	);

    	$res = Brand::where("id", $id)->update($data);


    	# Check if File Submitted
    	if($request->hasFile('image') && $res){ 

    		# For updating First We Need to Delete the 
    		# Old Image form db And Form Folder
    		HelperModel::FileModuleFireOnUpdateOrdelete($id, "BrandController");

    		HelperModel::uploadToImageModule($request, "image", "imageModule", "BrandController", $id);

    	}

    	if( $res ){
    		HelperModel::flash("Data Updating Successfull", "success");
    	}else{
    		HelperModel::flash("Data Updating Failed", "danger");
    	}

    	return redirect()->route("brandList");
    }


    public function brandDelete($id = NULL){

    	$id = (int) $id;
    	$res = Brand::where("id", $id)->delete();

    	if( $res ){
    		# We need also Delete the Img Form img Module
    		HelperModel::FileModuleFireOnUpdateOrdelete($id, "BrandController");
    		# -------------------------------------------

    		HelperModel::flash("Data Delation Successfull", "success");
    	}else{
    		HelperModel::flash("Data Delation Failed", "danger");
    	}

    	return redirect()->route("brandList");
    }

}
