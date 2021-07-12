<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Illuminate\Support\Facades\Auth;
use App\Balance;
use App\Admin\ClientGroupBalance;
use App\Admin\ClientSendEmailNotification;
use App\BankTransferWithdrawModel;

class WalletController extends Controller
{
    public function TransferRecievableBalance(Request $request)
    {
        $amount = $request->amount;
        $user = Auth::guard('user-api')->user();

        if(isset($user->balance)){
        if($amount <= $user->balance->Receivable)
        {
            $userBalance = Balance::where('user_id', $user->id)->get()->first();
            if(isset($userBalance))
            {
                $userBalance->Receivable = $userBalance->Receivable - $amount;
                $userBalance->Available  = $userBalance->Available  + $amount;
                $userBalance->save();
                $opnum = "WT-1" . time();
                $data = array(
                    "client_or_group_id" => $user->id,
                    "balance_for" => "client",
                    "operation_number" => $opnum,
                    "wallet_status" => 'Receivable',
                    "amount" => -$request->amount,
                );
                $res1 = ClientGroupBalance::create($data);
    
                $opnum = "WT-0" . time();
                $data = array(
                    "client_or_group_id" => $user->id,
                    "balance_for" => "client",
                    "operation_number" => $opnum,
                    "wallet_status" => 'Available',
                    "amount" => $request->amount,
                );
                $res2 = ClientGroupBalance::create($data);
                if($res1 && $res2)
                {
                    $res = ClientSendEmailNotification::create([
                        'client_id' => $user->id,
                        'suit' =>$user->suit,
                        'subject' => 'تم تحويل الرصيد إلي رصيد المتاح للإستخدام',
                        'body' => 'تم تحول الرصيد من الرصيد المستحق إلي الرصيد المتاح، رقم العملية ' . $opnum ,
                        'type' => 'notification',
                        ]);
    
                    $result['status'] = 200;
                    $result['msg'] = 'Balance Transfered Successfully.';
    
                }
                else
                {
                    $result['status'] = 404;
                    $result['msg'] = 'Error Occured, plase try again later.';
    
                }
            }else{
                $result['status'] = 404;
                $result['msg'] = 'حدث خطأ ما يرجي المحاولة لاحقا';
    
            }


        }else{

            $res = ClientSendEmailNotification::create([
                'client_id' => $user->id,
                'suit' =>$user->suit,
                'subject' => 'فشلت عملية تحويل الرصيد',
                'body' => 'يرجي إدخال مبلغ كافي في رصيدك المستحق'  ,
                'type' => 'notification',
                ]);

            $result['status'] = 404;
            $result['msg'] = 'There is NO ENOGUH MONEY in your Receivable balance.';
        }
    }else{
        $result['status'] = 404;
        $result['msg'] = 'مستخدم جديد ليس له رصيد ';

    }
        return response()->json($result);
    }

    public function BankTransferWithdraw(Request $request)
    {

            $bankName = $request->BankName;
            $accountName = $request->accountName;
            $iban = $request->iban;
            $amount = $request->amount;
            $photo = "";
            $user = Auth::guard('user-api')->user();
            
            if($amount > $user->balance->Receivable)
            {
                $res = ClientSendEmailNotification::create([
                    'client_id' => $user->id,
                    'suit' =>$user->suit,
                    'subject' => 'فشلت عملية تحويل الرصيد',
                    'body' => 'يرجي إدخال مبلغ كافي في رصيدك المستحق'  ,
                    'type' => 'notification',
                    ]);
    
                $result['status'] = 400;
                $result['msg'] = 'There is NO ENOGUH MONEY in your Receivable balance.';
                return response()->json($result);
            }
            if($request->file('photo'))
            {
                $file = $request->file('photo');
                $name = time().'.'.$file->getClientOriginalExtension();
                $file->move('BankTransferWithdrawa', $name);  
                $photo = 'BankTransferWithdrawa/' . $name;  
            }

            $relation = "";
            if(isset($request->relationship) && $request->relationship != '')
            {
                $relation = $request->relationship;
            }
            $res1 = BankTransferWithdrawModel::create([
                'BankName'=>$bankName,
                'accountName' => $accountName,
                'iban'  =>$iban,
                'amount' =>$amount,
                'photo' =>$photo,
                'user_id' => $user->id,
                'relationship' =>$relation
            ]);
            $res = ClientSendEmailNotification::create([
                'client_id' => $user->id,
                'suit' =>$user->suit,
                'subject' => 'قمنا بإستلام طلبك بنجاح',
                'body' => 'لقد قمنا بإستلام طلبك بنجاح و سيتم الرد عليك في أٌقرب وقت ممكن.'  ,
                'type' => 'notification',
                ]);
            $result['status'] = 200;
            $result['msg'] = 'We received your data successfully.';
            return response()->json($result);

    }

    public function RequestDebt(Request $request)
    {
        $user = Auth::guard('user-api')->user();

        $amount = $request->amount;
        if($user->authenticated == 0)
        {
            $result['status'] = 404;
            $result['msg'] = 'يرجي توثيق الهوية لتتمكن من طلب الخدمة.';
            return response()->json($result);


        }

        if($user->mem_package == 'Basic')
        {
            $res = ClientSendEmailNotification::create([
                'client_id' => $user->id,
                'suit' =>$user->suit,
                'subject' => 'نأسف ولكن باقتك لا تدعم هذة الميزة',
                'body' => 'باقتك لا تدعم هذة الميزة، يمكنك ترقية الباقة من الاعدادت.'  ,
                'type' => 'notification',
                ]);

            $result['status'] = 404;
            $result['msg'] = 'هذة الميزة غير مفعلة إلي الباقة الخاصة بالمستخدم';
            return response()->json($result);
        }elseif($user->mem_package == 'Premium')
        {
            if($amount > 100)
            {
                $res = ClientSendEmailNotification::create([
                    'client_id' => $user->id,
                    'suit' =>$user->suit,
                    'subject' => 'تجاوز الحد الأقصي للسحب',
                    'body' => 'باقتك تدعم سلف 100 ريال كحد أقصي.',
                    'type' => 'notification',
                    ]);
    
                $result['status'] = 404;
                $result['msg'] = 'تجاوزت الحد الأقصي للسحب.';
                return response()->json($result);
            }
            if($user->balance->Required != 0)
            {
                $res = ClientSendEmailNotification::create([
                    'client_id' => $user->id,
                    'suit' =>$user->suit,
                    'subject' => 'خطأ في الطلب',
                    'body' => 'لا يمكنك الطلب لوجود ملف سابق غير مسدد، يمكنك السداد من المحفظة رصيد مطلوب.',
                    'type' => 'notification',
                    ]);
    
                $result['status'] = 404;
                $result['msg'] = 'عملية سلف غير مسددة';
                return response()->json($result);
            }

            $res = Balance::where('user_id', $user->id)->get()->first();
            $res->Available += $amount ; 
            $res->Required += $amount;
            $res->save();
            $opnum1 = "WT-0" . time();
            $data = array(
                "client_or_group_id" => $user->id,
                "balance_for" => "client",
                "operation_number" => $opnum1,
                "wallet_status" => 'Available',
                "amount" => $amount,
            );
           $res1 = ClientGroupBalance::create($data);
           $opnum2 = "WT-1" . time();
           $data = array(
               "client_or_group_id" => $user->id,
               "balance_for" => "client",
               "operation_number" => $opnum2,
               "wallet_status" => 'Required',
               "amount" => $amount,
           );
          $res2 = ClientGroupBalance::create($data);
                $res = ClientSendEmailNotification::create([
                    'client_id' => $user->id,
                    'suit' =>$user->suit,
                    'subject' => 'تم تحويل الرصيد في رصيدك المتاح.',
                    'body' => 'تم تحويل رصيد في الرصيد المتاح الخاص بك، رقم العملية '.$opnum1,
                    'type' => 'notification',
                    ]);
                $res3 = ClientSendEmailNotification::create([
                        'client_id' => $user->id,
                        'suit' =>$user->suit,
                        'subject' => 'تم إضافة الرصيد في رصيدك المطلوب.',
                        'body' => 'تم تحويل رصيد في الرصيد المطلوب الخاص بك، رقم العملية '.$opnum2,
                        'type' => 'notification',
                        ]);
        
                $result['status'] = 200;
                $result['msg'] = 'تمت عملية السلف بنجاح';
                return response()->json($result);

        }elseif($user->mum_package == 'Golden')
        {
            if($amount > 100)
            {
                $res = ClientSendEmailNotification::create([
                    'client_id' => $user->id,
                    'suit' =>$user->suit,
                    'subject' => 'تجاوز الحد الأقصي للسحب',
                    'body' => 'باقتك تدعم سلف 300 ريال كحد أقصي.',
                    'type' => 'notification',
                    ]);
    
                $result['status'] = 404;
                $result['msg'] = 'تجاوزت الحد الأقصي للسحب.';
                return response()->json($result);
            }
            if($user->balance->Required != 0)
            {
                $res = ClientSendEmailNotification::create([
                    'client_id' => $user->id,
                    'suit' =>$user->suit,
                    'subject' => 'خطأ في الطلب',
                    'body' => 'لا يمكنك الطلب لوجود ملف سابق غير مسدد، يمكنك السداد من المحفظة رصيد مطلوب.',
                    'type' => 'notification',
                    ]);
    
                $result['status'] = 404;
                $result['msg'] = 'عملية سلف غير مسددة';
                return response()->json($result);
            }
            $res = Balance::where('user_id', $user->id)->get()->first();
            $res->Available += $amount ; 
            $res->Required += $amount;
            $res->save();
            $opnum1 = "WT-0" . time();
            $data = array(
                "client_or_group_id" => $user->id,
                "balance_for" => "client",
                "operation_number" => $opnum1,
                "wallet_status" => 'Available',
                "amount" => $amount,
            );
           $res1 = ClientGroupBalance::create($data);
           $data = array(
               "client_or_group_id" => $user->id,
               "balance_for" => "client",
               "operation_number" => $opnum1,
               "wallet_status" => 'Required',
               "amount" => $amount,
           );
          $res2 = ClientGroupBalance::create($data);
                $res = ClientSendEmailNotification::create([
                    'client_id' => $user->id,
                    'suit' =>$user->suit,
                    'subject' => 'تم تحويل الرصيد في رصيدك المتاح.',
                    'body' => 'تم تحويل رصيد في الرصيد المتاح الخاص بك، رقم العملية '.$opnum1,
                    'type' => 'notification',
                    ]);
                $res3 = ClientSendEmailNotification::create([
                        'client_id' => $user->id,
                        'suit' =>$user->suit,
                        'subject' => 'تم إضافة الرصيد في رصيدك المطلوب.',
                        'body' => 'تم تحويل رصيد في الرصيد المطلوب الخاص بك، رقم العملية '.$opnum1,
                        'type' => 'notification',
                        ]);
        
                $result['status'] = 200;
                $result['msg'] = 'تمت عملية السف بنجاح';
                return response()->json($result);
        }
    }

    public function PayRequired(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        if($user->balance->Available >= $user->balance->Required)
        {
            $req = $user->balance->Required;
            $res = Balance::where('user_id', $user->id)->get()->first();
            $res->Available = $res->Available - $res->Required;
            $res->Required = 0;
            $res->save();
            $opnum1 = "WT-0" . time();
            $data = array(
                "client_or_group_id" => $user->id,
                "balance_for" => "client",
                "operation_number" => $opnum1,
                "wallet_status" => 'Required',
                "amount" => 0,
            );
           $res2 = ClientGroupBalance::create($data);
           $data = array(
                "client_or_group_id" => $user->id,
                "balance_for" => "client",
                "operation_number" => $opnum1,
                "wallet_status" => 'Available',
                "amount" => -$req,
            );
            $res2 = ClientGroupBalance::create($data);
            $note = ClientSendEmailNotification::create([
                'client_id' => $user->id,
                'suit' =>$user->suit,
                'subject' => 'تم سداد قيمة المبلغ المطلوب.',
                'body' => 'تم سداد قيمة المبلغ المطلوب الخاص بك، رقم العملية '.$opnum1,
                'type' => 'notification',
                ]);

            $result['status'] = 200;
            $result['msg'] = 'تمت عملية السداد بنجاح';
            return response()->json($result);
        }else
        {
            $note = ClientSendEmailNotification::create([
                'client_id' => $user->id,
                'suit' =>$user->suit,
                'subject' => 'رصيد غير كاف.',
                'body' => 'عذرا الرصيد غير كاف، يمكنك شحن الرصيد و إعادة المحاولة ',
                'type' => 'notification',
                ]);

            $result['status'] = 200;
            $result['msg'] ='عذرا الرصيد غير كاف، يمكنك شحن الرصيد و إعادة المحاولة ';
            return response()->json($result);

        }
    }
    public function returnAllBalance()
    {
        $user = Auth::guard('user-api')->user();
        $result['status'] = 200;
        $result['data'] = $user->balance;
        $result['msg'] = 'جميع بيانات الرصيد';
        return response()->json($result);
    }
    public function allGroupBalances()
    {
        $user = Auth::guard('user-api')->user();
        $data = ClientGroupBalance::where('client_or_group_id', $user->id)->orderBy('created_at', 'desc')->get();
        $result['status'] = 200;
        $result['msg'] = 'جميع المعاملات';

        $result['data'] = $data;
        return response()->json($result);
        
    }
}
