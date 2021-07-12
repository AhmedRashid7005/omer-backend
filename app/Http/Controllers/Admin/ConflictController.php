<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Conflict;
use App\HelperModel;
use App\Admin\Admin;
use App\User;
use App\conflictReply;
use Illuminate\Support\Facades\Auth;

class ConflictController extends Controller
{
    public function listConflicts()
    {
        $conflictList = array();
        $conflicts = Conflict::all();

        if(@count($conflicts)){

            foreach ($conflicts as $k => $v) {
                $result = null;
                if($result = $this->makeConflictsData( $conflicts[$k] )) 
                    $conflictList[$k] = $result;
            }
        }
         return view("admin.conflict.conflictLists", compact("conflictList"));
    }
    
    public function ConflictDetails($id)
    {
        $id = (int) $id;
        $data = Conflict::find($id);
        $conflict = $this->makeConflictsData( $data );
        return view("admin.conflict.conflictDetails", compact("conflict"));
    }


    public function DeleteConflict($id)
    {
        $res = Conflict::find($id);
        $res->delete();
        HelperModel::flash("Deleted Successfully.");
        return redirect(route('ConflictList'));
    }

    public function RepsonseConflict($id)
    {
        $conflictResponseList = array();
        $conflictResponses = conflictReply::where('conflict_id', $id)->get();
        if(@count($conflictResponses)){

            foreach ($conflictResponses as $k => $v) {
                $result = null;
                if($result = $this->makeConflictsResponsesData( $conflictResponses[$k] )) 
                    $conflictResponseList[$k] = $result;
            }
        }
        
        return view("admin.conflict.conflictResponse",['data' => $conflictResponseList, 'conflict'=>Conflict::find($id)]);
    } 
    public function AddResponseToConflictAdmin(Request $request, $id){
        $message = $request->Message;
        $state = $request->Status;
        $res = conflictReply::create([
            'owner_id' => 1, //need to change error when user Auth() return null
            'owner_role' =>'admin', 
            'response' => $message, 
            'photos' => '',
            'conflict_id' => $id,
        ]);
        $c = Conflict::find($id);
        $c->status = $state;
        $c->save();
        HelperModel::flash('Message Added Successfully to Conflict.');
        return redirect(route('ResponseConflict', $id));


    }  
    private function makeConflictsData($conflicts)
    {
        $newArr = NULL;
        if( $conflicts ){
        $photos = json_decode($conflicts->photos);
         if(isset($photos) && count($photos)> 0)
         {
             $d='';
             foreach($photos as $p)
             {
                $d .= '
                <a href="' . asset($p). '" >
                   <img src="'.asset($p).'" style="width:50px;height:50px" />
                   </a> 
                   ';
             }
         }
         $newArr = array(
             "id" => $conflicts->id,
             "check_box" => "<input type='checkbox' name='ids[]' class='all_id' value=$conflicts->id >",
             "subject" => $conflicts->subject ,
             "conflict_number" => $conflicts->conflict_number,
             "conflict_d" => $conflicts->conflict_d,
             "status" => $conflicts->status,
             "description" => $conflicts->description ,
             "customer_sol" => $conflicts->customer_sol ,
             "suit" => $conflicts->user->suit,
             "username" => $conflicts->user->name,
             "photos" => isset($d)? $d : 'No photos attached',
             "Creaated At" => $conflicts->created_at,
         );
 
        }
        return $newArr;
    }
    private function makeConflictsResponsesData($conflictResponses)
    {
        $newArr = NULL;
        if( $conflictResponses ){
        $photos = json_decode($conflictResponses->photos);
         if(isset($photos) && count($photos)> 0)
         {
             $d='';
             foreach($photos as $p)
             {
                $d .= '
                <a href="' . asset($p). '" >
                   <img src="'.asset($p).'" style="width:50px;height:50px" />
                   </a> 
                   ';
             }
         }

         $role = $conflictResponses->owner_role;
         if($role == 'admin')
         {
             $owner = Admin::find($conflictResponses->owner_id);
             $owner = $owner->first_name . ' ' . $owner->last_name;

         }else{
            $owner = User::find($conflictResponses->owner_id);
            $owner = $owner->name . ' ' . $owner->name2;
         }
         $newArr = array(
             "id" => $conflictResponses->id,
             "check_box" => "<input type='checkbox' name='ids[]' class='all_id' value=$conflictResponses->id >",
             "owner" => $owner ,
             "owner_role" => $conflictResponses->owner_role,
             "reponse" => $conflictResponses->response,
             "photos" => isset($d)? $d : 'No photos attached',
             "created_at" => $conflictResponses->created_at ,
         );
        }
        return $newArr;
    }

}
