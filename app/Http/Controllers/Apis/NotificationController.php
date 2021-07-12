<?php

namespace App\Http\Controllers\Apis;
use  Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\ClientSendEmailNotification;
class NotificationController extends Controller
{
    public function getUnReadedNotifications(Request $request)
    {
        $data=[];
        $user = Auth::guard('user-api')->user();
        $notes = ClientSendEmailNotification::where(['client_id' => 2 , 'type'=>'notification', 'readed' => 0])->get();
        $data['number'] = $notes->count();
        $data['data'] = $notes;
        return response()->json( $data, 200);
    }
    public function readNote(Request $request)
    {
        $data= [];
        if($request->noteId && $request->noteId != '')
        {
            $user = Auth::guard('user-api')->user();
            $note = ClientSendEmailNotification::where(['client_id'=>$user->id, 'id'=>$request->noteId])->get();
            if(isset($note) && $note->count() > 0)
            {
                $data['data'] = $note;
                foreach ($note as $n)
                {
                    $n->readed = 1;
                    $n->save();
                }
            }
            else
            {
                $data ['ErrMsg'] = 'Invalid Notification Id.';

            }
        }
        else
        {
            $data ['ErrMsg'] = 'Invalid Notification Id.';

        }

        return response()->json($data);
    }
    public function AllNotes(Request $request)
    {
        $user = Auth::guard('user-api')->user();
        $note = ClientSendEmailNotification::where('client_id', '=' , $user->id)->get();
        foreach ($note as $n)
        {
            $n->readed = 1;
            $n->save();
        }

        $data=[];
        $data['data'] = $note;
        return response()->json($data);
    }

}
