<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Jobs\emailJob;
use Illuminate\Http\Request;
use Mail;
class mailController extends Controller
{
    // arafat test email function
    public function arafatTestMail(){
        $customerEmail = "arafat.dml@gmail.com";
        $messageBody = "This is a Email Testing Function By arafat.dml@gmail.com or find me in fiverr web_lover Live Test On my Mail Sending Issue";

        $res = Mail::send([], [],function ($message) use ($customerEmail,$messageBody) {
           $message->from('test@test.com','My Test Name');
           $message->subject("Test Mail");
           $message->setBody($messageBody);
           $message->to($customerEmail);
        });
        dd($res);
    }

    public function mailJob(){
              // send all mail in the queue.
              $job = (new emailJob())
                  ->delay(
                      now()
                      ->addSeconds(10)
                  ); 

              dispatch($job);

              // Artisan::call('queue:work');
      echo "Bulk mail send successfully in the background..."; 
    }
}
