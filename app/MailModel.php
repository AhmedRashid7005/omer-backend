<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require __DIR__.('/phpSmtp/vendor/autoload.php');

class MailModel extends Model
{
    private static $mailFrom = "services@crm.thewlweb.com";
    private static $mailName = "Guarantaccess";

    /**
     *
     * @date: 05/12/2020
     * @author arafat | arafat.dml@gmail.com
     * phpSmtp SendMail
     *
     */
    public static function phpSmtpSendMail($to, $subject, $body, $from = false, $name = false)
    {
        if($from){
            self::$mailFrom = $from;
        }
        if($name){
            self::$mailName = $name;
        }

        $mail = new PHPMailer(true);
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->SMTPDebug = false;
            // Enable verbose debug output
            $mail->isSMTP();      // on live Comment This Line
            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'testme2api@gmail.com';                     // SMTP username
            $mail->Password   = 'arafat12345678';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom(self::$mailFrom, self::$mailName);
            $mail->addAddress($to);     // Add a recipient
            // $mail->addAddress('ellen@example.com');// Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    /**
     *
     * @date: 05/12/2020
     * @author arafat | arafat.dml@gmail.com
     * laravelSendMail
     *
     */
    public static function laravelSendMail($to, $subject, $body, $from = false, $name = false)
    {
        if($from){
            self::$mailFrom = $from;
        }
        if($name){
            self::$mailName = $name;
        }
        $mailFromAre = self::$mailFrom;
        $mailNameAre = self::$mailName;

        $res = Mail::send([], [],function ($message) use ($to, $subject, $body, $mailFromAre, $mailNameAre) {
           $message->from($mailFromAre, $mailNameAre);
           $message->subject($subject);
           $message->setBody($body, 'text/html');
           $message->to($to);
        });

        return $res;
    }

    /**
     *
     * @date: 05/12/2020
     * @author arafat | arafat.dml@gmail.com
     * mailSend
     * provider "laravel" or phpsmtp
     *
     */

    public static function mailSend($to, $subject, $body, $provider = "sendMail", $from = false, $name = false)
    {
        if($provider == "phpsmtp"){
           return self::phpSmtpSendMail($to, $subject, $body, $from, $name);
        }else{
           return self::laravelSendMail($to, $subject, $body, $from, $name);
        }
    }
}