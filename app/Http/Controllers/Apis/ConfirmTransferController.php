<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TransferConfirm;
use  Illuminate\Support\Facades\Auth;
use App\Admin\ClientSendEmailNotification;


class ConfirmTransferController extends Controller
{
    /*
    required information
        account_owner_name
        bank_name
        account_number
        amount
        confirmAmount
        purpose (addBalance, openAccount, RenewParticipant, other)
        date
        photo
    */
    public function SendManualTransfer(Request $request)
    {
        if($request->account_owner_name !='' && $request->bank_name != '' && $request->account_number != '' && $request->amount != '' && $request->confirmAmount != '' && $request->purpose != '' && $request->date !='' && $request->photo != '')
        {
            //if the request has files store it in ReviewPhotos file.
            $photo = '';
            if($request->hasFile('photo'))
            {
                $file = $request->file('photo');
                $name =time().'.'.$file->getClientOriginalExtension();
                $file->move('ConfirmTranfersPhotos', $name);  
                $photo = 'ConfirmTranfersPhotos/' . $name;  
            }

            if($request->amount == $request->confirmAmount )
            {
                $user = Auth::guard('user-api')->user();
                $opertaion_NUM = 'TP-' . time();
                $res = TransferConfirm::create([
                    'operation_number'   => $opertaion_NUM,
                    'account_owner_name' => $request->account_owner_name,
                    'bank_name'          => $request->bank_name,
                    'account_number'     => $request->account_number,
                    'amount'             => $request->amount,
                    'purpose'            => $request->purpose,
                    'date'               => $request->date,
                    'photo'              => $photo,
                    'user_id'            => $user->id
                ]);

                $res2 = ClientSendEmailNotification::create([
                    'client_id'     =>  $user->id,
                    'suit'          =>  $user->suit,
                    'subject'       =>  'تم إرسال الإيصال بنجاح ',
                    'body'          =>  'قمنا بإستلام الإيصال الخاص بك بنجاح و سنقوم بالرد عليك في أسرع وقت ، رقم العملية ' . $opertaion_NUM,
                    'type'          => 'notification',
                    ]);
                if($res && $res2)
                {
                    $result['status'] = 200 ;
                    $result['msg'] = 'تم إستلام الإيصال الخاص بك بنجاح و سنقوم بالرد عليك في أسرع وقت ممكن، رقم العملية '. $opertaion_NUM;
                }else{
                    $result['status'] = 404 ;
                    $result['msg'] = 'هناك مشكلة يرجي المحاولة لاحقا.';

                }
            }
            else
            {
                $result['status'] = 400;
                $result['msg'] = 'هناك خطأ في البيانات، يجب أن تكون قيم المبلغ متساوية';
            }
        }
        else
        {
            $result['status'] = 400;
            $result['msg'] = 'هناك خطأ في البيانات، يرجي إرسال جميع البيانات المطلوبة.';
        }

        return response()->json($result);
    }

    //purpose and photo
    public function sendTransferWithPhoto(Request $request)
    {
        if($request->purpose != '' && $request->hasFile('photo'))
        {
            $photo = '';
            if($request->hasFile('photo'))
            {
                $file = $request->file('photo');
                $name =time().'.'.$file->getClientOriginalExtension();
                $file->move('ConfirmTranfersPhotos', $name);  
                $photo = 'ConfirmTranfersPhotos/' . $name;  
            }

            $user = Auth::guard('user-api')->user();
            $opertaion_NUM = 'TP-' . time();
            $res = TransferConfirm::create([
                'operation_number'   => $opertaion_NUM,
                'account_owner_name' => '',
                'bank_name'          => '',
                'account_number'     => '',
                'amount'             => '',
                'purpose'            => $request->purpose,
                'date'               => '',
                'photo'              => $photo,
                'user_id'            => $user->id
            ]);

            $res2 = ClientSendEmailNotification::create([
                'client_id'     =>  $user->id,
                'suit'          =>  $user->suit,
                'subject'       =>  'تم إرسال الإيصال بنجاح ',
                'body'          =>  'قمنا بإستلام الإيصال الخاص بك بنجاح و سنقوم بالرد عليك في أسرع وقت ، رقم العملية ' . $opertaion_NUM,
                'type'          => 'notification',
                ]);
            if($res && $res2)
            {
                $result['status'] = 200 ;
                $result['msg'] = 'تم إستلام الإيصال الخاص بك بنجاح و سنقوم بالرد عليك في أسرع وقت ممكن، رقم العملية '. $opertaion_NUM;
            }else{
                $result['status'] = 404 ;
                $result['msg'] = 'هناك مشكلة يرجي المحاولة لاحقا.';

            }
        }else
        {
            $result['status'] = 404 ;
            $result['msg'] = 'هناك مشكلة في البيانات يرجي التأكد من إدخال جميع البيانات.';

        }

        return response()->json($result);
    }
}
