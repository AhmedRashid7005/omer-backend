<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Admin;
use App\HelperModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function adminLogin(){
        $user = auth()->guard('admin')->user();
        if($user){
            return redirect()->route("dashboard");
        }
        return view("admin.auth.admin_login");
    }

    public function adminLoginCheck(Request $request){
        // dd(md5($request->password));
        // dd($request);
        // dd($request);
        # arafat set cookie for remember me Function
        $cookiePersistenceTime = (86400 * 30); // 1 day *  30 day = 1 months
        if(isset($request->remember_me)){
            # Set The cookie
            setcookie("admin_email", $request->email, ( time() + $cookiePersistenceTime ), "/");
            setcookie("admin_password", $request->password, ( time() + $cookiePersistenceTime ), "/");
            setcookie("remember_me", "checked", ( time() + $cookiePersistenceTime ), "/");
        }else{
            # Remove the Cookie
            setcookie("admin_email", $request->email, ( time() - $cookiePersistenceTime ), "/");
            setcookie("admin_password", $request->password, ( time() - $cookiePersistenceTime ), "/");
            setcookie("remember_me", "", ( time() - $cookiePersistenceTime ), "/");
        }
        # End arafat set cookie for remember me Function

        $email = $request->email;
        $password = md5($request->password);

        // $admin = Admin::where("email", $email)->where("password", $password)->first();
        // dd($admin);

        # If email or Password Error Redirect to Login
        /*if(!$admin){
            Session::put("class", "danger");
            Session::put('message','User Name or Password is Not Valid ! Try Again.');
            return redirect()->route("adminLogin");
        }*/

        # All the Checkings are Doen Let's do the login
        // Auth::loginUsingId($admin->id);
        // return redirect()->route("dashboard");

        # Work on our custom login by arafat
        $credentials = array(
            "email" => $email,
            "password" => md5($request->password),
        );
        $pass = md5($request->password);

        $admin = Admin::where("email", $email)->where("password", $pass)->first();
        // dd($admin);
        // dd(Auth::guard('admin')->loginUsingId($admin->id));

        if( isset($admin->id) ){
            
            if( Auth::guard('admin')->loginUsingId($admin->id) )
            {
                HelperModel::flash("Welcome ! Login Successfull", "primary");
                // dd("here");
                return redirect()->route("dashboard");
            }

        }

        # end Work on our custom login by arafat

        # Someting is wrong redirect to login page
        Session::put("class", "danger");
        Session::put('message','User Name or Password is Not Valid ! Try Again.');
        return redirect()->route("adminLogin");

    }

    public function adminLogout(){
        auth()->guard('admin')->logout();
        Session::invalidate();

        Session::put("class", "success");
        Session::put('message','Logout Successfull');
        return redirect()->route("adminLogin");
    }

}
