<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Illuminate\Support\Facades\Auth;
use App\Conflict;
use App\conflictReply;
use App\Admin\Admin;
class ConflictController extends Controller
{
    public function SendConflict(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        $data = [];
        $conf_num = 'CR-' . rand(100,999);
        $res = Conflict::where('conflict_number','=',$conf_num)->get();
        while(isset($res) && $res->count() > 0)
        {
            $conf_num = 'CR-' . rand(100,999);
            $res = Conflict::where('conflict_number','=',$conf_num)->get();    
        }
        $counter = 0;
        foreach($request->file('file') as $file)
        {
            $name = $counter . time().'.'.$file->getClientOriginalExtension();
            $file->move('UserfilesConflicts', $name);  
            $data[] = $name;  
            $counter +=1;
        }
        Conflict::create([
            'subject'=>$request->subject,
            'conflict_number'=>$conf_num,
            'conflict_d'=>'محل النزاع',
            'status'=> 'جار المراجعة',
            'description' => $request->desc,
            'customer_sol' => $request->solution,
            'suit' => $request->suit,
            'photos'=> json_encode($data),
            'user_id' => $user->id
        ]);
        
        $result = [];
        $result['status'] = 200;
        $result['msg'] = 'تم إستلام النزاع الخاص بك بنجاح سيتم الرد عليك في أقرب وقت.';
        return response()->json($result);
    }
    public function EndConflict(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        $id = $request->id;
        //$c_num = $request->conflict_number;
        $res = Conflict::where('id','=',$id)->update(['status' => 'منتهي']);    
        if($res)
        {

            $result['status'] = 200;
            $result['msg'] = 'تم حل النزاع بنجاح';

        }
        else
        {
            $result['status'] = 404;
            $result['msg'] = 'رقم النزاع غير موجود';
        }
        return response()->json($result);
    }

    //input id (conflict id) // repsonse // files
    public function sendResponse(Request $request)
    {
        if($request->response != '' && $request->id)
        {
            $user = Auth::guard('user-api')->user();
            $conflict_id = $request->id;
            $counter = 0;
            $data = [];
            if($request->has('file'))
            {
                foreach($request->file('file') as $file)
                {
                    $name = $counter . time().'.'.$file->getClientOriginalExtension();
                    $file->move('UserfilesConflicts', $name);  
                    $data[] = 'UserfilesConflicts/' . $name;  
                    $counter +=1;
                }
            }

            $res = conflictReply::create([
                'owner_id' => $user->id, 
                'owner_role' =>'user', 
                'response' => $request->response, 
                'photos' => json_encode($data),
                'conflict_id' => $conflict_id,
            ]);

            $res2 = Conflict::find($conflict_id);
            $res2->status = 'جار المراجعة';
            $res2->save();

            if($res)
            {

                $result['status'] = 200;
                $result['msg'] = 'تم إرسال الرد بنجاح';

            }
            else
            {
                $result['status'] = 404;
                $result['msg'] = 'رقم النزاع غير موجود';
            }
        }
        else
        {
            $result['status'] = 400;
            $result['msg'] = 'يرجي إدخال البيانات المطلوبة.';

        }
        return response()->json($result);
    }

    //retrieve response for specific conflict
    public function retrieveResponse(Request $request)
    {
        if($request->id != '')
        {

            $id = $request->id ;
            $res = Conflict::find($id);
            if(isset($res) && $res->count() > 0)
            {
                $d = $res->conflictReplys;
                $owner =[];
                foreach($d as $a)
                {
                    if($a->owner_role == 'admin')
                    {
                        $r=  Admin::find($a->owner_id);
                        $owner['first_name'] = $r->first_name;
                        $owner['last_name'] = $r->last_name;
                        $a->owner_id = $owner;
                    }
                }
                return response()->json($d);
            }
            else
            {
                $result['status'] = 404;
                $result['msg'] = 'خطأ في البيانات رقم نزاع غير صحيح';
    
            }
        }
        else
        {
            $result['status'] = 400;
            $result['msg'] = 'يرجي إدخال البيانات المطلوبة.';

        }
        return response()->json($result);
    }

    public function AllUserConflicts(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        $data = $user->conflicts;
        if(isset($data) && $data->count() > 0)
        {
            $result['status'] = 200;
            $result['data'] = $data;
        }
        else
        {
            $result['status'] = 200;
            $result['msg'] = 'لا يوجد أي نزاعات.' ;

        }
        return response()->json($result);
    }
}
