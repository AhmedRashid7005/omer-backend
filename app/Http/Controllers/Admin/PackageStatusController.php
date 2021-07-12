<?php

namespace App\Http\Controllers\Admin;

use App\Admin\PackageStatus;
use App\HelperModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PackageStatusController extends Controller
{
    public function packageStatusList(){

    	$packageStatuses = PackageStatus::get();

    	if($packageStatuses){
    		$packageStatuses = $packageStatuses->toArray();
    	}

    	return view("admin.packageStatus.packageStatusList", compact("packageStatuses"));
    }

    public function packageStatusAdd(){

    	return view("admin.packageStatus.packageStatusAdd");
    }

    public function packageStatusStore(Request $request){
    	// dd($request);

    	$data = array(
    		'package_status' => $request->package_status,
    	);

    	$res = PackageStatus::create($data);

    	HelperModel::defaultFlash($res, "Creation");

    	return redirect()->route("packageStatusList");
    }

    public function packageStatusEdit($id = NULL){
    	$packageStatus = PackageStatus::find($id);

    	return view("admin.packageStatus.packageStatusEdit", compact("packageStatus"));
    }

    public function packageStatusUpdate(Request $request){
    	// dd($request);

    	$id = (int) $request->id;

    	$data = array(
    		'package_status' => $request->package_status,
    	);
    	
    	$res = PackageStatus::where("id", $id)->update($data);

    	HelperModel::defaultFlash($res, "Updating");
    	
    	return redirect()->route("packageStatusList");

    }

    public function packageStatusDelete($id = NULL){
    	$id = (int) $id;

    	
    	$notDeleteableIds = array(1,2,3);

    	if(in_array($id, $notDeleteableIds)){

    		HelperModel::flash("You can not Delete The Main 3 Configurations", "warning");
    	}else{

    		$res = PackageStatus::where("id", $id)->delete();

    		HelperModel::defaultFlash($res, "Delation");
    	}

    	return redirect()->route("packageStatusList");

    }


}
