<?php

namespace App\Http\Controllers\Admin;
use App\Admin\Blog;
use App\Admin\BlogType;
use App\HelperModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    public function blogList(){
    	$newBlogArr = array();

    	$blogs = Blog::with(['blogType', "images"=> function($query){
    		$query->where("module_name", "BlogController");
    	}])->get();

    	// dd($blogs);

    	if( $blogs ){

    		$blogs = $blogs->toArray();
    	}

    	// dd($blogs);

    	# Now we need Process the Image
    	# We need to set the array key not image

    	# ---------------------------------------

    	# At least one multi array
    	if( $blogs && is_array( $blogs[0]["images"] ) ){

    		foreach( $blogs as $k => $v ){

    			$imgArray = array();
    			
    			foreach ($v["images"] as $kk => $vv) {
    				// dump($vv["img"]);

    				$imgArray[] = HelperModel::imageTagAdding( $vv["img"] );
    			}

    			# renmove it form array 
    			unset( $blogs[$k]["images"] );
    			# remove Brand Type
    			unset( $blogs[$k]["blog_type"] );

    			# add the image to the array
    			# Make the array to string
    			$imgStr = implode(" ", $imgArray);

    			# Now Rrwrite the Array
    			$newBlogArr[$k]["id"] = $v["id"];
    			$newBlogArr[$k]["blog_type_id"] = $v["blog_type"]["blog_type"];
    			$newBlogArr[$k]["code"] = $v["code"];
    			$newBlogArr[$k]["subject"] = $v["subject"];
    			$newBlogArr[$k]["content"] = $v["content"];
    			$newBlogArr[$k]["allImg"] = $imgStr;
    			$newBlogArr[$k]["meta_title"] = $v["meta_title"];
    			$newBlogArr[$k]["meta_keyword"] = $v["meta_keyword"];
    			$newBlogArr[$k]["meta_description"] = $v["meta_description"];
    			$newBlogArr[$k]["created_at"] = $v["created_at"];
    			$newBlogArr[$k]["updated_at"] = $v["updated_at"];

    		}

    	}

    	// dd($blogs);
    	// dd($newBlogArr);

    	# ---------------------------------------
    	return view( "admin.blog.blogList", compact("newBlogArr") );
    }

    private function blogTypeList(){
    	$blogType = BlogType::get();

    	$blogType = HelperModel::make_list($blogType, "blog_type");
    	// dd($blogType);

    	return $blogType;
    }

    public function blogAdd(){
    	$blogTypeList = $this->blogTypeList();
    	return view("admin.blog.blogAdd", compact("blogTypeList"));
    }

    public function blogStore(Request $request){
    	// dd($request);

    	# We can not add add More feature
    	# Because we are using multiple image upload
    	# Feature

    	$data = array(
    		"blog_type_id" => $request->blog_type_id,
    		"code" => $request->code,
    		"subject" => $request->subject,
    		"content" => $request->content,
    		"meta_title" => $request->meta_title,
    		"meta_keyword" => $request->meta_keyword,
    		"meta_description" => $request->meta_description,
    	);


    	# Save the data
    	$res = Blog::create($data);

    	# Check if File Submitted
    	if($request->hasFile('image') && $res){ 

    		HelperModel::uploadToImageModule($request, "image", "imageModule", "BlogController", $res->id);
    	}
    	
    	if( $res ){
    		HelperModel::flash("Data Creation Successfull", "success");
    	}else{
    		HelperModel::flash("Data Creation Failed", "danger");
    	}

    	return redirect()->route("blogList");
    }

    public function blogEdit($id = NULL){
    	
    	$id = (int) $id;

    	$blog = Blog::find($id);

    	// dd($blog);

    	$blogTypeList = $this->blogTypeList();

    	return view("admin.blog.blogEdit", compact("blog", "blogTypeList"));
    }

    public function blogUpdate(Request $request){
    	// dd($request);

    	$id = (int) $request->id;

    	$data = array(
    		"blog_type_id" => $request->blog_type_id,
    		"code" => $request->code,
    		"subject" => $request->subject,
    		"content" => $request->content,
    		"meta_title" => $request->meta_title,
    		"meta_keyword" => $request->meta_keyword,
    		"meta_description" => $request->meta_description,
    	);

    	$res = Blog::where("id", $id)->update($data);


    	# Check if File Submitted
    	if($request->hasFile('image') && $res){ 

    		# For updating First We Need to Delete the 
    		# Old Image form db And Form Folder
    		HelperModel::FileModuleFireOnUpdateOrdelete($id, "BlogController");

    		HelperModel::uploadToImageModule($request, "image", "imageModule", "BlogController", $id);

    	}

    	if( $res ){
    		HelperModel::flash("Data Updating Successfull", "success");
    	}else{
    		HelperModel::flash("Data Updating Failed", "danger");
    	}

    	return redirect()->route("blogList");
    	
    }



    public function blogDelete($id = NULL){
    	
    	$id = (int) $id;
    	$res = Blog::where("id", $id)->delete();

    	if( $res ){
    		# We need also Delete the Img Form img Module
    		HelperModel::FileModuleFireOnUpdateOrdelete($id, "BlogController");
    		# -------------------------------------------

    		HelperModel::flash("Data Delation Successfull", "success");
    	}else{
    		HelperModel::flash("Data Delation Failed", "danger");
    	}

    	return redirect()->route("blogList");

    }


}
