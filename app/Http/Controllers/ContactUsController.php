<?php

namespace App\Http\Controllers;

use App\Admin\Admin;
use App\Admin\ContactUs;
use App\Admin\ContactUsReply;
use App\HelperModel;
use App\MailModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactUsController extends Controller
{

    public function contactUsList(){

        $contactUsList = contactUs::get();

        if( $contactUsList ){
            $contactUsList = $contactUsList->toArray();
        }

        // dd($contactUsList);

        return view("admin.pages.contactUs", compact("contactUsList"));
    }

   
    public function contactUsStore(Request $request){
        // dd($request);

        $data = array(
            "receiving_department" => $request->receiving_department,
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "suit" => $request->suit,
            "subject" => $request->subject,
            "message_description" => $request->message_description,
            "created_at" => Carbon::now(),
        );

        $res = ContactUs::create($data);

        if($res){

            // Send Email

            $to = NULL;

            $admin = Admin::where("admin_role_id", 1)->first();

            if($admin){
                $to = $admin->email;
            }

            $messageBody = '<html><body>';
            $messageBody .="<br>";
            $messageBody .= '<h1>Contact Information Submitted</h1>';
            $messageBody .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $messageBody .= "<tr style='background: #eee;'><td><strong>Receiving Department:</strong> </td><td>" . $request->receiving_department . "</td></tr>";
            $messageBody .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $request->name . "</td></tr>";
            $messageBody .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" . $request->email . "</td></tr>";
            $messageBody .= "<tr style='background: #eee;'><td><strong>phone:</strong> </td><td>" . $request->phone . "</td></tr>";
            $messageBody .= "<tr style='background: #eee;'><td><strong>Suit:</strong> </td><td>" . $request->suit . "</td></tr>";
            $messageBody .= "<tr style='background: #eee;'><td><strong>Subject:</strong> </td><td>" . $request->subject . "</td></tr>";
            $messageBody .= "<tr style='background: #eee;'><td><strong>Message Description:</strong> </td><td>" . $request->message_description . "</td></tr>";

            $messageBody .= "</table>";
            $messageBody .= "</body></html>";

            // echo $messageBody;

            $res = MailModel::mailSend($to, "Contact Information Submitted", $messageBody);

            // End Send Email
            HelperModel::flash("Contact Data Send Successfull", "primary");
        }else{
            HelperModel::flash("Contact Data Send Failed", "Danger");

        }



        return redirect()->route("contactUsAr");

    }

    public function contactUsDelete($id = NULL){

        // dd($id);

        $id = (int) $id;

        $res = contactUs::where("id", $id)->delete();
        ContactUsReply::where("contact_us_id", $id)->delete();

        if( $res ){

            HelperModel::flash("Contact Data Delete Successfull", "primary");
        }else{
            HelperModel::flash("Contact Data Delete Failed", "Danger");

        }

        return redirect()->route("contactUsList");

    }

    public function contactUsReply($id = NULL){
        
        $contactUs = contactUs::find($id);

        return view("admin.pages.contactUsReply", compact("contactUs"));
    }

    public function contactUsReplyPost(Request $request){
        // dump($request);

        $contactUsId = (int) $request->contact_us_id;
        $contactUs = ContactUs::find($contactUsId);

        // dd($contactUs);

        if( @count($contactUs) ){

            $data = array(
                "contact_us_id" => $contactUsId,
                "subject" => $request->subject,
                "body" => $request->body,
            );

            if( $contactUs->email ){

                # Save the data to the database 
                $res = ContactUsReply::create($data);

                # Send the email 

                $mailSubject = $request->subject;
                $mailBody = $request->body;

                $mailFromAre = env("MAIL_FROM_ADDRESS");
                $mailNameAre = env("MAIL_FROM_NAME");

                // dump($mailFromAre);
                // dd($mailNameAre);

                $to = $contactUs->email;
                // dd($to);

                $mailres = Mail::send([], [],function ($message) use ($to, $mailSubject, $mailBody, $mailFromAre, $mailNameAre) {
                   $message->from($mailFromAre, $mailNameAre);
                   $message->subject($mailSubject);
                   $message->setBody($mailBody, 'text/html');
                   $message->to($to);
                });

                # Show Flash Message

                if($res){
                    HelperModel::flash("Message Reply Successfull", "primary");
                }else{
                    HelperModel::flash("Message Reply Failed", "danger");
                }

                return redirect()->route("contactUsDetails",$contactUsId);

            }
        }


    }

    public function contactUsReplyDelete($id = NULL){
        $id = (int) $id;

        $res = ContactUsReply::where("id", $id)->delete();

        if($res){
            HelperModel::flash("Data Deleted Successfull", "primary");
        }else{
            HelperModel::flash("Data Deleted Successfull", "danger");
        }

        return redirect()->route("contactUsList");

    }

    public function contactUsDetails($id = NULL){

        $res = ContactUs::where('id', $id)->with('contactUsReplies')->first();
        $contact_us_replies = array();

        if($res){
            $res = $res->toArray();
            $contact_us_replies = $res["contact_us_replies"];
            unset($res["contact_us_replies"]);
        }


        // dump($contact_us_replies);
        // dump($res);
        return view("admin.pages.contactUsDetails", compact("res", "contact_us_replies"));

    }


}
