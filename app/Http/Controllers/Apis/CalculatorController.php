<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Illuminate\Support\Facades\Auth;
use App\Admin\Calculator;
use App\Admin\SubscriberPackageName;
use App\Admin\RechargeCard;
use App\Admin\ClientGroupBalance;
use App\Admin\ClientSendEmailNotification;

class CalculatorController extends Controller
{
    public function returnCashBack(Request $request)
    {
        if($request->amount != '' && $request->method != '')
        {
            $data = [];
            $user = Auth::guard('user-api')->user();
            $package_id = SubscriberPackageName::where('name', '=', $user->mem_package)->get()[0]->id;
            $res = Calculator::where('subscriber_package_name_id',  $package_id)
            ->where('module_for','=' , $request->method )
            ->where('data_from', '<=', $request->amount)
            ->where('data_to', '>=', $request->amount)
            ->get();
            if ($res && $res->count() > 0)
            {
                $res = $res[0];
                if($res->amount_type == 'Fixed')
                {
                    $data['status'] = 200;
                    $data['cashback'] = $res->amount;
                }elseif($res->amount_type == 'Percentage')
                {
                    $data['status'] = 200 ;
                    $data['cashback'] = ($res->amount/100) * $request->amount;
                }
                return $data;
            }
            else
            {
                $data['status'] = 404 ;
                $data['msg'] = 'لم يتم إدخال بيانات الاسترداد النقدي للبيانات المرسلة من قبل الإدارة';
                return response()->json($data);
    
            }

        }
        else
        {
            $data['status'] = 400 ;
            $data['msg'] = 'لم يتم إدخال جميع البيانات المطلوبة';
            return response()->json($data);
        }

    }

    //api to check card number and password
    public function checkCard(Request $request)
    {

        if($request->card != '' && $request->password != '')
        {
            $res = RechargeCard::where('card_number','=',$request->card)
                        ->where('password','=',$request->password)
                        ->get();
            if(isset($res) && $res->count()>0)
            {
                $res = $res[0];
                if($res->card_expiry == 'valid_for_ever' || date('m/d/Y') <= $res->card_expiry   )
                {
                    $data['status'] = 200 ;
                    $data['msg'] = 'بيانات بطاقة صحيحة و سارية';
                    $data['card'] = $res;

                    $allBalance = $res->amount;

                    $user = Auth::guard('user-api')->user();
                    $package_id = SubscriberPackageName::where('name', '=', $user->mem_package)->get()[0]->id;
                    $res = Calculator::where('subscriber_package_name_id',  $package_id)
                    ->where('module_for','=' , 'recharge card' )
                    ->where('data_from', '<=', $allBalance)
                    ->where('data_to', '>=', $allBalance)
                    ->get();
                    $data['cashback'] = 0;
                    if ($res && $res->count() > 0)
                    {
                        
                        $res = $res[0];
                        if($res->amount_type == 'Fixed')
                        {
                            $data['status'] = 200;
                            $data['cashback'] = $res->amount;
                        }elseif($res->amount_type == 'Percentage')
                        {
                            $data['status'] = 200 ;
                            $data['cashback'] = ($res->amount/100) * $request->amount;
                        }

                        
                    }
                    $data['all'] = $data['cashback'] + $allBalance ;
                    return response()->json($data);
                }else
                {
                    $data['status'] = 404 ;
                    $data['msg'] = 'بطاقة منتهية';
                    return response()->json($data);
                }

            }
            else
            {
                $data['status'] = 404 ;
                $data['msg'] = 'بيانات البطاقة غير صحيحة';
                return response()->json($data);
            }
        }
        else
        {
            $data['status'] = 400 ;
            $data['msg'] = 'لم يتم إدخال جميع البيانات المطلوبة';
            return response()->json($data);
        }
    }
    public function AddBalance(Request $request)
    {
        if($request->amount != '' && $request->cashBack != '' && $request->allBalance != '' && $request->card != '' && $request->password != '')
        {
            $amount = $request->amount;
            $cashBack = $request->cashBack;
            $allBalance = $request->allBalance;
        
            $res = RechargeCard::where('card_number','=',$request->card)
                        ->where('password','=',$request->password)
                        ->get();
            if(isset($res) && $res->count()>0)
            {
                $res = $res[0];
                if($res->card_expiry == 'valid_for_ever' || date('m/d/Y') <= $res->card_expiry   )
                {

                        $res->amount = 0;
                        $res->save();
                        $user = Auth::guard('user-api')->user();
                        $d = ClientGroupBalance::where('client_or_group_id', '=', $user->id)
                            ->where('balance_for', '=', 'client')
                            ->where('wallet_status','=', 'Available')
                            ->get();
                        

                        if(isset($d) && $d->count() > 0)
                        {
                            $d = $d[0];
                            $d->amount += $allBalance;
                            $d->save();
                        }   
                        else
                        {
                            ClientGroupBalance::create([
                                'client_or_group_id' => $user->id,
                                'balance_for' => 'client',
                                'wallet_status' => 'Available',
                                'amount' => $allBalance
                            ]);

                        }

                        $note = ClientSendEmailNotification::create([
                            'client_id' => $user->id,
                            'suit' =>$user->suit,
                            'subject' => 'تم شحن الرصيد بنجاح  ',
                            'body' =>  'تمت عملية الشحن بنجاح و اضافة المبلغ في رصيدك' . $allBalance,
                            'type' => 'notification',
                            ]);
                            $data['status'] = 200 ;
                            $data['msg'] = 'تم شحن الرصيد إلي الحساب بنجاح';
                            return response()->json($data);

                }else
                {
                    $data['status'] = 404 ;
                    $data['msg'] = 'بطاقة منتهية';
                    return response()->json($data);
                }

            }
            else
            {
                $data['status'] = 404 ;
                $data['msg'] = 'بيانات البطاقة غير صحيحة';
                return response()->json($data);
            }

        }
        else
        {
            $data['status'] = 400 ;
            $data['msg'] = 'لم يتم إدخال جميع البيانات المطلوبة';
            return response()->json($data);
        }
    }
    
    
}
