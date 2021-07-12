<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function AddNewPart(Request $request)
    {
        $res = User::create([
            'ship_country' => $request->country,
            'name' =>$request->name,
            'name2' =>$request->name2,
            'email' =>$request->email,
            'mem_package' =>$request->mem_package,
            'password' =>Hash::make($request->password),
            'ship_add_1' =>$request->ship_add_1,
            'ship_add_2' =>$request->ship_add_2,
            'ship_city' =>$request->ship_city,
            'ship_postal_code' =>$request->ship_postal_code,
            'phone1' =>$request->phone1,
            'phone2' =>$request->phone2,
        ]);
        if($res)
        {
            $result['status'] = 200;
            $result['msg'] = 'تم تسجيل بيانات المستخدم بنجاح';
            return response()->json($result);
        }else{
            $result['status'] = 404;
            $result['msg'] = 'هناك مشكلة الرجاء المحاولة مرة أخري. ';
            return response()->json($result);

        }
    }
}
