<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\ContactUs;
use App\User;

use  Illuminate\Support\Facades\Auth;
use App\Admin\ClientSendEmailNotification;

class ContactUsController extends Controller
{

    /*ِApi to send message from contact us form with multiple files.*/
    /*فاضل تعدل عمود رقم المعاملة */
    public function SendContactMessage(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        $data=[];

        $counter = 0;
        foreach($request->file('file') as $file)
        {
            //return "asdf";
            $name = $counter . time().'.'.$file->getClientOriginalExtension();
            $file->move('Userfiles', $name);  
            $data[] = 'Userfiles/' . $name;  
            $counter +=1;
        }

        $contact_num = 'Co-' . time();
        $res1 = ContactUs::create([
            'contactNum' => $contact_num,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->ship_phone,
            'suit' => $user->suit,
            'subject' => $request->subject,
            'message_description' => $request->desc,
            'file' =>json_encode($data),
        ]);

        $client_id = $user->id;
        $u = User::where("id", $client_id)->get();
        
        //send notification to client
        $res = ClientSendEmailNotification::create([
            'client_id' => $user->id,
            'suit' =>$user->suit,
            'subject' => 'تم استلام رسالتك بنجاح',
            'body' => 'لقد إستلامنا رسالتك بنجاح و سيتم الرد عليك في أقرب وقت، رقم العملية الخاصة بك هو' . $contact_num,
            'type' => 'notification',
            ]);

        if(!$res1 || !$res)
        {
            $result['status'] = 400;
            $result['msg'] = 'هناك مشكلة في البيانات';
            return response()->json($result);
        }
        

        $result = [];
        $result['status'] = 200;
        $result['msg'] = 'تم إستلام رسالتك بنجاح، سنقوم بالرد عليك في أقرب وقت.';
        return response()->json($result);
    }
}
