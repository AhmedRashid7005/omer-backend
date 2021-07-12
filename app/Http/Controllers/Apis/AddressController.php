<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\SuitAddress;
use  Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function get_Address()
    {
        $address = SuitAddress::all();
        return response()->json($address, 200);
    }

    public function get_Address_info($id)
    {
        $address = SuitAddress::find($id);
        if($address && $address->count() > 0)
        {
            return response()->json($address, 200);
        }
        return response()->json('Invalid Address Id', 404);
    }
    public function returnName(Request $request)
    {
        $data=[];
        $user = Auth::guard('user-api')->user();
        $data['name'] =  $user->name;
        $data['suit'] = $user->suit;
        return response()->json($data, 200);
    }
}
