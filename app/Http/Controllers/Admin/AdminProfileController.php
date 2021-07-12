<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Admin;
use App\Admin\AdminRole;
use App\HelperModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class AdminProfileController extends Controller
{
    public function adminProfile(){

    	// dump( auth()->guard('admin')->user() );

    	$adminId = auth()->guard('admin')->user()->id;

    	$adminData = Admin::with("adminRole")->find($adminId);
    	$adminImg = Admin::select("img")->find($adminId);
    	$adminImg = $adminImg->img;

    	// dump($adminImg);
    	// dd($adminData);

    	return view("admin.profile.profile", compact('adminImg', 'adminData'));
    }


    public function adminProfileUpdate(Request $request){

    	// dump($request);
    	$upload_img_name = null;


    	$profileUpdate = array(

    		"first_name" => $request->first_name,
    		"last_name" => $request->last_name,
    		"email" => $request->email,
    		"phone" => $request->phone,
    		"address" => $request->address,

    	);

    	# Check if the Admin Password Change is set Here ...

    	if( $request->password ){
    		$password = md5( $request->password );
    		$profileUpdate["password"] = $password;
    	}


    	# Check if File Submitted
    	if($request->hasFile('img')){ 

    		$imgUploaFolder  = "AdminImg";

    		$image       = $request->file('img');
    		$ext         = $image->getClientOriginalExtension();

    		$filename = round(microtime(true)).'.'.$ext;

    		# move the file to the folder 
    		$image->move(storage_path("app/public/{$imgUploaFolder}/"), $filename);

    		$upload_img_name = "public/storage/{$imgUploaFolder}/$filename";

    		$profileUpdate["img"] = $upload_img_name;

    		// dd($upload_img_name);
    		# for viewing the img  => http://localhost/laravel_5_6/public/storage/AdminImg/1608727615.png

    	}

    	# Now Update the Data ...

    	$adminId = auth()->guard('admin')->user()->id;


    	$adminUpdate = Admin::where("id", $adminId)->update( $profileUpdate );
    	
    	if( $adminUpdate ){

    		HelperModel::flash("Profile Update Successfull", "primary");
    	}else{

    		HelperModel::flash("Profile Update Failed", "danger");
    	}

    	return redirect()->route("adminProfile");

    }

    public function adminList(){
        $admins = Admin::with("adminRole")->get();

        $adminDatas = array(); 
        // dd($admins);
        if($admins){
            foreach ($admins as $k => $v) {
                $adminDatas[$k]["id"] = $v->id;
                $adminDatas[$k]["first_name"] = $v->first_name;
                $adminDatas[$k]["last_name"] = $v->last_name;
                $adminDatas[$k]["email"] = $v->email;
                $adminDatas[$k]["phone"] = $v->phone;
                $adminDatas[$k]["img"] = "<img src='".URL::to('/')."/".$v->img."' height='200px' width=200px >";
                $adminDatas[$k]["address"] = $v->address;
                $adminDatas[$k]["status"] = $v->status;
                $adminDatas[$k]["admin_role"] = $v->adminRole->name;
            }
        }

        return view("admin.adminModule.adminList", compact("adminDatas"));

    }

    public function adminCreate(){
        
        $adminRoleList = HelperModel::adminRoleList();

        // dd($adminRoleList);

        return view("admin.adminModule.adminCreate", compact('adminRoleList'));
    }

    public function adminStore(Request $request){

        // dd($request);

        $upload_img_name = null;

        # Check if File Submitted
        if($request->hasFile('img')){ 

            $imgUploaFolder  = "AdminImg";

            $image       = $request->file('img');
            $ext         = $image->getClientOriginalExtension();

            $filename = round(microtime(true)).'.'.$ext;

            # move the file to the folder 
            $image->move(storage_path("app/public/{$imgUploaFolder}/"), $filename);

            $upload_img_name = "public/storage/{$imgUploaFolder}/$filename";

            // dd($upload_img_name);
            # for viewing the img  => http://localhost/laravel_5_6/public/storage/AdminImg/1608727615.png

        }

        $data = array(
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "admin_role_id" => $request->admin_role,
            "email" => $request->email,
            "password" => md5($request->password),
            "phone" => $request->phone,
            "img" => $upload_img_name,
            "address" => $request->address,
            "status" => $request->status,
        );


        $res = Admin::create($data);

        if($res){

            HelperModel::flash("Admin Created Successfull", "primary");
        }else{

            HelperModel::flash("Admin Created Failed", "danger");
        }

        return redirect()->route("adminList");
        
    }

    public function adminEdit($id = NULL){
        $id = (int) $id;

        $admin = Admin::find($id);

        $adminRoleList = HelperModel::adminRoleList();


        return view("admin.adminModule.adminEdit", compact("admin", "adminRoleList"));
    }

    public function adminUpdate(Request $request){
        // dd($request);

        $upload_img_name = null;

        # Check if File Submitted
        if($request->hasFile('img')){ 

            $imgUploaFolder  = "AdminImg";

            $image       = $request->file('img');
            $ext         = $image->getClientOriginalExtension();

            $filename = round(microtime(true)).'.'.$ext;

            # move the file to the folder 
            $image->move(storage_path("app/public/{$imgUploaFolder}/"), $filename);

            $upload_img_name = "public/storage/{$imgUploaFolder}/$filename";

            // dd($upload_img_name);
            # for viewing the img  => http://localhost/laravel_5_6/public/storage/AdminImg/1608727615.png

        }

        $data = array(
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "admin_role_id" => $request->admin_role,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
            "status" => $request->status,
        );

        # If Password Is set...

        if($request->password){
            $data["password"] = md5($request->password);
        }

        # If img is set
        if( $upload_img_name ){
            $data["img"] = $upload_img_name;
        }

        $id = (int) $request->id;

        $res = Admin::where("id", $id)->update($data);

        if($res){

            HelperModel::flash("Admin Update Successfull", "primary");
        }else{

            HelperModel::flash("Admin Update Failed", "danger");
        }

        return redirect()->route("adminList");
    }

    public function adminDelete($id = NULL){
        $id = (int) $id;

        $adminId = auth()->guard('admin')->user()->id;

        if($id == $adminId){
            HelperModel::flash("You can Not delete Yourself", "danger");
        }else{
            $res = Admin::where("id", $id)->delete();

            if($res){

                HelperModel::flash("Admin Delete Successfull", "primary");
            }else{

                HelperModel::flash("Admin Delete Failed", "danger");
            }
        }

        return redirect()->route("adminList");
    }

    public function isAdminMailAlreadyExist(Request $request){
        $email = $request->email;
        $isEmailFound = Admin::Where("email", $email)->first();
        if(@count($isEmailFound)){
            echo 1;
        }else{
            echo 0;
        }
    }


}
