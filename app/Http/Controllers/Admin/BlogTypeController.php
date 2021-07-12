<?php

namespace App\Http\Controllers\Admin;
use App\Admin\BlogType;
use App\HelperModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BlogTypeController extends Controller
{
    public function blogTypeList(){
    	$blogTypeList = BlogType::get();

    	if( $blogTypeList ){
    		$blogTypeList = $blogTypeList->toArray();
    	}

    	return view("admin.blogType.blogTypeList", compact("blogTypeList"));
    }


    public function blogTypeAdd(){

    	return view("admin.blogType.blogTypeAdd");
    }


     public function blogTypeStore(Request $request){
     	// dd($request);

     	$data = array();
    	$res = false;

    	if( is_array( $request->blog_type ) ){

    		foreach ($request->blog_type as $k => $v) {
				$data = array(
					"blog_type" => $v,
				);
				$res = BlogType::create($data); 			
    		}
    	}

    	if( $res ){
    		HelperModel::flash("Data Added Successfull", "success");
    	}else{
    		HelperModel::flash("Data Added Failed", "danger");
    	}

    	return redirect()->route("blogTypeList");
    }


    public function blogTypeEdit($id = NULL){
    	$id = (int) $id;

    	$blogType = BlogType::find($id);

    	return view("admin.blogType.blogTypeEdit", compact('blogType'));
    }


    public function blogTypeUpdate(Request $request){
    	$id = $request->id;
    	$data = array(
    		"blog_type" => $request->blog_type,
    	);

    	$res = BlogType::where("id", $id)->update($data);

    	if( $res ){
    		HelperModel::flash("Data Updating Successfull", "success");
    	}else{
    		HelperModel::flash("Data Updating Failed", "danger");
    	}

    	return redirect()->route("blogTypeList");
    }


     public function blogTypeDelete($id = NULL){
     	$id = (int) $id;

     	$res = BlogType::where("id", $id)->delete();

     	if( $res ){
     		HelperModel::flash("Data Delation Successfull", "success");
     	}else{
     		HelperModel::flash("Data Delation Failed", "danger");
     	}

     	return redirect()->route("blogTypeList");
    }


}
