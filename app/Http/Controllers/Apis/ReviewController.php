<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;
use  Illuminate\Support\Facades\Auth;
use App\Admin\ClientSendEmailNotification;

class ReviewController extends Controller
{
    //input
    /* 
        'operation_number' => CR-54654
        'user_id',
        'bill_number',
        'ontime'           => from 1 to 5
        'covered'          => from 1 to 5
        'identical'        => from 1 to 5
        'recommend'        => from 1 to 5
        'title',
        'content',
        'photos'           => Maximum 5
        'shareLinks'       => array of links
        'share',           => share with name, share without name, don't share
        'status'           =>default new, then done after admin approval then the user can add a balance
    */
    public function AddReview(Request $request)
    {
        if($request->bill_number !='' && $request->ontime != '' && $request->covered != '' && $request->identical != '' && $request->recommend != '' && $request->title != '' && $request->content != '' && $request->share != '')
        {
            $user = Auth::guard('user-api')->user();

            //if the request has files store it in ReviewPhotos file.
            $counter = 0;
            if($request->hasFile('file'))
            {
                foreach($request->file('file') as $file)
                {
                    $name = $counter . time().'.'.$file->getClientOriginalExtension();
                    $file->move('ReviewPhotos', $name);  
                    $data[] = 'ReviewPhotos/' . $name;  
                    $counter +=1;
                }
            }
    
    
            //Generate random number as operation number
            $num = 'CR-'.time(); 
            $res1 = Review::create([
                'operation_number'  =>  $num,
                'user_id'           =>  $user->id,
                'bill_number'       =>  $request->bill_number,
                'ontime'            =>  $request->ontime,
                'covered'           =>  $request->covered,
                'identical'         =>  $request->identical,
                'recommend'         =>  $request->recommend,
                'title'             =>  $request->title,
                'content'           =>  $request->content,
                'photos'            =>  ($request->hasFile('file')) ? json_encode($data) : '' ,
                'shareLinks'        =>  isset($request->shareLinks) ? $request->shareLinks : '' ,
                'share'             =>  $request->share,
                'status'            =>  'new'
            ]);

            //send notification to client
            $res2 = ClientSendEmailNotification::create([
                'client_id' => $user->id,
                'suit' =>$user->suit,
                'subject' => 'تم استلام تقييمك بنجاح',
                'body' =>  'تم إستلام التقييم الخاص بك ، سيتم مراجعة التقييم و إضافة الرصيد خلال ال 24 ساعة القادمة رقم المعاملة ' . $num,
                'type' => 'notification',
                ]);

            if($res1 && $res2)
            {
                $result['status'] = 200;
                $result['msg'] = 'تم إستلام التقييم الخاص بك ، سيتم مراجعة التقييم و إضافة الرصيد خلال ال 24 ساعة القادمة رقم المعاملة ' . $num;
            }else{
                $result['status'] = 404;
                $result['msg'] = 'هناك مشكلة يرجي المحاولة لاحقا. ';
            }
        }
        else{
            $result['status'] = 400;
            $result['msg'] = 'هناك مشكلة في البيانات يرجي التأكد من إرسال جميع البيانات المطلوبة.';
        }
        return response()->json($result);
    }
}
