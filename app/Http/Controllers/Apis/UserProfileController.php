<?php

namespace App\Http\Controllers\Apis;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function UpdatName(Request $request)
    {
        
        if(isset($request->name) && $request->name != ''){
            $user = Auth::guard('user-api')->user();
            $user->name = $request->name;
            $user->name2 = $request->name2;
            $user->save();

            return response()->json('Name updated successfully.', 200);
        }else{
            return response()->json('Error: Name Missing',404);
        }
    }

    public function UpdateEmail(Request $request)
    {
        if($request->email == '' || $request->confirmEmail == '')
        {
            return response()->json('Error: Email and confirm email Required.', 200);
        }

        if($request->email == $request->confirmEmail){

            $user = User::where('email', '=', $request->email);
            if($user != Null && $user->count()>0)
            {
                return response()->json('Error: This Email Already Exists.', 200);
            }
                $user = Auth::guard('user-api')->user();
                $user->email = $request->email;
                $user->save();
                return response()->json('Error:  Email Updated Successfully.', 200);

        }else
        {
            return response()->json('Error: Email must be matched.', 200);
        }
    }
    public function UpdatePhone(Request $request)
    {
        if(isset($request->phone) && $request->phone != ''){
            $user = User::where('ship_phone', '=', $request->phone)->get();
            if($user != Null && $user->count()>0)
            {
                return response()->json('Error: This Phone Already Registered.', 200);
            }
            $user = Auth::guard('user-api')->user();
            $user->ship_phone = $request->phone;
            $user->save();
            return response()->json('Phone Updated Successfully.', 200);
        }
        else
        {
            return response()->json('Error: Phone Required.', 200);

        }

    }
    public function addPhone(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        $user->phone1 = $request->phone1;
        $user->phone2 = $request->phone2;
        $user->save();
        return response()->json('Phone Number Added Successfully.');
        
    }

}
