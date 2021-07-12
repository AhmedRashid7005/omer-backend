<?php

namespace App\Http\Controllers;

use App\Admin\Admin;
use App\Admin\WebsiteDevelopmentReply;
use App\HelperModel;
use App\MailModel;
use App\WebsiteDevelopment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class WebsiteDevelopmentController extends Controller
{
    public function websiteDevelopmentList(){
        $websiteDevelopemt = WebsiteDevelopment::get();

        if( $websiteDevelopemt ){

            $websiteDevelopemt = $websiteDevelopemt->toArray();
        }

        // dd($websiteDevelopemt);

        return view("admin.pages.websiteDevelopment", compact("websiteDevelopemt"));
    }

    public function websiteDevelopmentStore(Request $request){
        // dd($request);

        $upload_img_name = null;

        $data = array(

            "topic" => $request->topic,
            "name" => $request->name,
            "phone" => $request->phone,
            "email" => $request->email,
            "description" => $request->description,
            "do_this_personally" => $request->do_this_personally,
            "created_at" => Carbon::now(),

        );


        # Check if File Submitted
        if($request->hasFile('img')){ 

            $imgUploaFolder  = "websiteDevelopment";

            $image       = $request->file('img');
            $ext         = $image->getClientOriginalExtension();

            $filename = round(microtime(true)).'.'.$ext;

            # move the file to the folder 
            $image->move(storage_path("app/public/{$imgUploaFolder}/"), $filename);

            $upload_img_name = "public/storage/{$imgUploaFolder}/$filename";

            $data["image"] = $upload_img_name;

            // dd($upload_img_name);
            # for viewing the img  => http://localhost/laravel_5_6/public/storage/AdminImg/1608727615.png

        }

        $res = WebsiteDevelopment::create($data);

        if($res){

            # Send Mail

            $to = NULL;

            $admin = Admin::where("admin_role_id", 1)->first();

            if($admin){
                $to = $admin->email;
            }

            $messageBody = '<html><body>';
            $messageBody .="<br>";
            $messageBody .= '<h1>Website Development Information Submitted</h1>';
            $messageBody .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $messageBody .= "<tr style='background: #eee;'><td><strong>Topic:</strong> </td><td>" . $request->topic . "</td></tr>";
            $messageBody .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $request->name . "</td></tr>";
            $messageBody .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" . $request->email . "</td></tr>";
            $messageBody .= "<tr style='background: #eee;'><td><strong>phone:</strong> </td><td>" . $request->phone . "</td></tr>";
            $messageBody .= "<tr style='background: #eee;'><td><strong>Description:</strong> </td><td>" . $request->description . "</td></tr>";
            $messageBody .= "<tr style='background: #eee;'><td><strong>Do This Personally:</strong> </td><td>" . $request->do_this_personally . "</td></tr>";
            $messageBody .= "</table>";
            $messageBody .= "</body></html>";

            // echo $messageBody;

            $res = MailModel::mailSend($to, "Website Development Information Submitted", $messageBody);

            # end Send Mail

            HelperModel::flash("Message Send Successfull", "success");
        }else{

            HelperModel::flash("Message Send Failed", "success");
        }

        return redirect()->route("websiteDevelopmentAr");

    }

    public function websiteDevelopmentDelete($id = NULL){
        $id = (int) $id;

        $res = WebsiteDevelopment::where("id", $id)->delete();
        WebsiteDevelopmentReply::where("website_development_id", $id)->delete();
        
        if($res){

            $img = WebsiteDevelopment::find($id);

            # delete The Image
            @unlink($img->image);

            HelperModel::flash("Data Delete Successfull", "success");
        }else{

            HelperModel::flash("Data Delete Failed", "success");
        }

        return redirect()->route("websiteDevelopmentList");

    }


    # For Reply module

    public function websiteDevelopmentReply($id = NULL){
        
        $websiteDevelopment = WebsiteDevelopment::find($id);

        return view("admin.pages.websiteDevelopmentReply", compact("websiteDevelopment"));
    }

    public function websiteDevelopmentReplyPost(Request $request){
        // dump($request);

        $website_development_id = (int) $request->website_development_id;
        $websiteDevelopment = WebsiteDevelopment::find($website_development_id);

        // dd( $websiteDevelopment );

        if( @count($websiteDevelopment) ){

            $data = array(
                "website_development_id" => $website_development_id,
                "subject" => $request->subject,
                "body" => $request->body,
            );


            if( $websiteDevelopment->email ){

                # Save the data to the database 
                $res = WebsiteDevelopmentReply::create($data);

                # Send the email 

                $mailSubject = $request->subject;
                $mailBody = $request->body;

                $mailFromAre = env("MAIL_FROM_ADDRESS");
                $mailNameAre = env("MAIL_FROM_NAME");

                // dump($mailFromAre);
                // dd($mailNameAre);

                $to = $websiteDevelopment->email;
                // dd($to);

                $mailres = Mail::send([], [],function ($message) use ($to, $mailSubject, $mailBody, $mailFromAre, $mailNameAre) {
                   $message->from($mailFromAre, $mailNameAre);
                   $message->subject($mailSubject);
                   $message->setBody($mailBody, 'text/html');
                   $message->to($to);
                });

                # Show Flash Message

                if($res){
                    HelperModel::flash("Website Development Reply Successfull", "primary");
                }else{
                    HelperModel::flash("Website Development Reply Failed", "danger");
                }

            }
        }

        return redirect()->route("websiteDevelopmentDetails",$website_development_id);
    }

    public function websiteDevelopmentReplyDelete($id = NULL){
        $id = (int) $id;

        $res = WebsiteDevelopmentReply::where("id", $id)->delete();

        if($res){
            HelperModel::flash("Data Deleted Successfull", "primary");
        }else{
            HelperModel::flash("Data Deleted Successfull", "danger");
        }

        return redirect()->route("websiteDevelopmentList");

    }

    public function websiteDevelopmentDetails($id = NULL){

        $res = WebsiteDevelopment::where('id', $id)->with('websiteDevelopmentReplies')->first();
        $websiteDevelopmentReplies = array();

        if($res){
            $res = $res->toArray();
            // dd($res);
            $websiteDevelopmentReplies = $res["website_development_replies"];
            unset($res["website_development_replies"]);
        }


        // dump($websiteDevelopmentReplies);
        // dump($res);
        return view("admin.pages.websiteDevelopmentDetails", compact("res", "websiteDevelopmentReplies"));

    }

    # End for Reply Module


}
