<?php

namespace App\Http\Controllers\Apis;
use JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password; 
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyEmail;
use Carbon\Carbon;
class AuthController extends Controller
{
    public function login(Request $request)
    {

        $remeber_me = $request->input('remember');
        $credentials = $request->only(['email', 'password']);
       $token =  Auth::guard('user-api')->attempt($credentials, $remeber_me);
       if(!$token)
       {
           return response()->json('Unauthorized', 401);
       }
       else
       {
           $user = Auth::guard('user-api')->user();
           $user->access_token = $token;

           return response()->json($user, 200);
       }
    }

    public function logout(Request $request)
    {

        $token = $request->header('auth-token');
        if($token)
        {   
            $user = Auth::guard('user-api')->user();
            $user->last_apperance =  Carbon::now();
            $user->save(); 
            JWTAuth::setToken($token)->invalidate();
            return response()->json("Logged out successfully",200);
        }
        else{
            return response()->json('Opps! something went wrong about token.',401);
        }
       
    }
    public function ForgetPassword(Request $request)
    {
        $credentials = $request->header('email');

        $messageBody = '<html><body>';
        $messageBody .="<br>";
        $messageBody .= '<h1>Your password resset link</h1>';
        $messageBody .= "</body></html>";

        // echo $messageBody;

        Mail::To($credentials)->send(new NotifyEmail());
        return response()->json('password reset link has been sent to your email.');
    
    }

    public function passwordUpdate(Request $request)
    {
        return "a";
    }
}
