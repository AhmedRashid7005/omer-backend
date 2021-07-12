<?php

namespace App\Http\Controllers\Admin;

use App\Admin\SubscriberPackageName;
use App\HelperModel;
use App\Http\Controllers\Controller;
use App\PaypalPayment;
use App\TapPaymentData;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

use App\Admin\EmailTemplate;


class EmailTemplateController extends Controller
{
    public function emailTemplateList(){
        $emailTemplates = EmailTemplate::get();

        if( $emailTemplates ){
            $emailTemplates =  $emailTemplates->toArray();
        }

        return view("admin.emailTemplate.emailTemplateList", compact("emailTemplates"));
    }

    public function emailTemplateAdd(){

        return view("admin.emailTemplate.emailTemplateAdd");
    }

    public function emailTemplateStore(Request $request){
        // dd($request);

        $data = array(
            "name" => $request->name,
            "subject" => $request->subject,
            "body" => $request->body,
        );

        $res = EmailTemplate::create($data);

        if( $res ){

            HelperModel::flash("Email Template Created Successfully", "success");
        }else{

            HelperModel::flash("Email Template Created Failed", "danger");

        }

        return redirect()->route("emailTemplateList");

    }

    public function emailTemplateEdit($id = NULL){

        $id = (int) $id;

        $emailTemplate = EmailTemplate::find($id);
        
        return view("admin.emailTemplate.emailTemplateEdit", compact("emailTemplate"));
    }

    public function emailTemplateUpdate(Request $request){
        // dd($request);

        $id = (int) $request->id;

        $data = array(
            "name" => $request->name,
            "subject" => $request->subject,
            "body" => $request->body,
        );

        $res = EmailTemplate::where("id", $id)->update($data);

        if( $res ){

            HelperModel::flash("Email Template Updated Successfully", "success");
        }else{

            HelperModel::flash("Email Template Updated Failed", "danger");

        }

        return redirect()->route("emailTemplateList");
        
    }

    public function emailTemplateDelete($id = NULL){

        $id = (int) $id;

        // dd($id);

        $res = EmailTemplate::where("id", $id)->delete();

        if( $res ){

            HelperModel::flash("Email Template Deleted Successfully", "success");
        }else{

            HelperModel::flash("Email Template Deleted Failed", "danger");

        }

        return redirect()->route("emailTemplateList");
        
    }

    # We use it For ajax Purpose Only .....
    public function getMailTemplateById($id = NULL){

        $res = EmailTemplate::find($id);

        if(@count($res)){

            $res = json_encode($res);
        }else{
            $res = 0;
        }

        return $res;
    }

}
