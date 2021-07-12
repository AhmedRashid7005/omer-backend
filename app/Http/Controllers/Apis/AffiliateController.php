<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Illuminate\Support\Facades\Auth;
use App\affiliatePerson;
use Illuminate\Support\Str;
use App\affiliateType;
use App\affiliateGroup;



class AffiliateController extends Controller
{
    public function returnAfflitateData(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        $email = $user->email;
        $affiliatePerson = affiliatePerson::where("email", $email)
        ->get()->first();
        if(isset($affiliatePerson))
        {
            $packageTypeId = affiliateType::where('name', $user->mem_package)->first();
            $packageTypeId = $packageTypeId->id;

            $package_commesion = affiliateGroup::where('affiliate_type_id', $packageTypeId)->get()->first();
            $affiliatePerson->price = $package_commesion->price;
            $result['status'] = 200;
            $result['data'] = $affiliatePerson;
        }else{
            $packageTypeId = affiliateType::where('name', $user->mem_package)->first();
            if(isset($packageTypeId) && $packageTypeId->count() > 0)
            {
                $packageTypeId = $packageTypeId->id;
                $package_commesion = affiliateGroup::where('affiliate_type_id', $packageTypeId)->get()->first();
                if(isset($package_commesion) && $package_commesion->count() > 0)
                {
                    $price = $package_commesion->price;
                    $valid = $package_commesion->valid_time_limit;
                    $random_eight_digit = Str::random(8);
                    $data = array(
                        "name" => $user->name,
                        "email" => $user->email,
                        "identity_num" => $random_eight_digit,
                        "affiliate_link" => str_replace(" ", "", $user->name . $user->name2)."_".$random_eight_digit,
                        "price" => $price,
                        'type'  => 'user',
                        'valid_time_limit' => $valid,
                        'total_client_commission' => 0,
                        'total_affiliate_num' => 0,
                        'affiliate_groups_id' =>$packageTypeId
                    );
                    $res = affiliatePerson::create($data);
                    if($res)
                    {
                        $result['status'] = 200;
                        $result['data'] = $res;
        
                    }else{
                        $result['status'] = 404;
                        $result['msg'] = 'هناك مشكلة ما، يرجي المحاولة في وقت لاحق';
                    }
        
                }else{
                    $result['status'] = 404;
                    $result['msg'] = 'لم يتم إضافة جروب بعد خاص بالبرنامج المسجل عليه المستخدم الحالي.';
    
                }

            }else{
                /* There's no type in affilitate type as sama as the type of current user program. */
                $result['status'] = 404;
                $result['msg'] = 'البرنامج غير متاح للنظام المسجل عليه المستخدم الحالي.';

            }
        }
        return response()->json($result);
    }
    public function Search(Request $request)
    {
        if($request->email == '' && $request->name == '' && $request->identity_num == '')
        {
            $result['status'] = 400;
            $result['msg'] = 'خطأ في البيانات';

        }
        if($request->email != '')
        {
            $affiliatePerson = affiliatePerson::where("email", $request->email)
                               ->get()->first();
            if(isset($affiliatePerson) && $affiliatePerson->count() > 0)
            {
                $result['status'] = 200;
                $result['data'] = $affiliatePerson;
            }else{
                $result['status'] = 404;
                $result['msg'] = 'لا يوجد بيانات';

            }
        }elseif($request->identity_num != '')
        {
            $affiliatePerson = affiliatePerson::where("identity_num", $request->identity_num)
                                ->get()->first();
                if(isset($affiliatePerson) && $affiliatePerson->count() > 0)
                {
                    $result['status'] = 200;
                    $result['data'] = $affiliatePerson;
                }else{
                    $result['status'] = 404;
                    $result['msg'] = 'لا يوجد بيانات';
    
                }
        }elseif($request->name != '')
        {
            $affiliatePerson = affiliatePerson::where("name", $request->name)
                                ->get();
            if(isset($affiliatePerson) && $affiliatePerson->count() > 0)
            {
                $result['status'] = 200;
                $result['data'] = $affiliatePerson;
            }else{
                $result['status'] = 404;
                $result['msg'] = 'لا يوجد بيانات';
            }
        }
    
    return response()->json($result);
    }
}
