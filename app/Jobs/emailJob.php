<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class emailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $to = "arafat.dml@gmail.com";
        $subject = "Mail job testing";
        $body = "<h3 style='color: red'> Email job Processing test</h3>";
        $mailFromAre = "info@info.com";
        $mailNameAre = "Jon Doe";


        $res = Mail::send([], [],function ($message) use ($to, $subject, $body, $mailFromAre, $mailNameAre) {
           $message->from($mailFromAre, $mailNameAre);
           $message->subject($subject);
           $message->setBody($body, 'text/html');
           $message->to($to);
        });
    }
}
