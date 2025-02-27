<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class EmailController extends Controller
{
   
    public function registration(Request $request)
    {
        $id = 1; // user id
        $usermail = 'mahmud.hosen@miaki.co';
    	$token = $this->get_token($id);
    	$url = route('email-verify',$token);

    	$mail = new PHPMailer(true);

        try {
            //Server settings
    	    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    	    $mail->isSMTP();                                            // Set mailer to use SMTP
    	    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    	    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    	    $mail->Username   = 'growskills.network@gmail.com';                     // SMTP username
    	    $mail->Password   = 'grteaysylgeoqlvz';                               // SMTP password
    	    // $mail->Password   = 'growskills.network@2022';                               // SMTP password
    	    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    	    $mail->Port       = 587;                                    // TCP port to connect to

    	    //Recipients
    	    $mail->setFrom('growskills.network@gmail.com');
    	    $mail->addAddress($usermail);     // Add a recipient
    	    // $mail->addAddress($data['user_mail']);               // Name is optional
    	    $mail->addReplyTo($usermail, 'Information');
    	    // $mail->addCC('growskills.network@gmail.com');
    	    // $mail->addBCC('growskills.network@gmail.com');

    	    // Attachments
    	    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    	    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    	    // Content
    	    $mail->isHTML(true);                                  // Set email format to HTML
    	    $mail->Subject = 'Grow Skills: Email Verification';
    	    $mail->Body    = "<h3>Email Verification URL:</h3><h4>$url</h4>";
    	    $mail->AltBody = '<b>Thank You!</b>';
    	    $mail->send();
    	    $mail->smtpClose();

    	    return [
                "message" => "A Verification Link Has Sent to Your Email Address."
            ];

            
        } catch (Exception $e) {

            return [
                "class" => "danger",
                "message" => "Email could not be sent. Mailer Error: $mail->ErrorInfo"
            ];

        }
    }

    public function emailVerify( $token )
    {
        return "Email Verified successfully";

        /* 

    	$emailVerify = EmailVerify::where('token',$token)->first();

    	if( $emailVerify && $emailVerify->status ){

    		$title = "Email Verification";
            
    		$user = User::find($emailVerify->user_id);
            $user->verify = 1;
            $user->save();

    		$usermail = $user->email;

    		return view('user.login.verify',compact('title','usermail'));

    	}else{

    		$title = "Invalid URL";
    		$data = "Invalid URL";
    		return view('user.login.invalid',compact('title','data'));

    	}

        */

    }

    private function get_token( $id )
    {

    	$token = Str::random(10);
    	$token = Crypt::encryptString($token);
    	$token = $id.$token;

    	// $emailVerify = new EmailVerify;
    	// $emailVerify->user_id = $id;
    	// $emailVerify->token = $token;
    	// $emailVerify->date = date('Y-m-d');
    	// $emailVerify->status = 1;
    	// $emailVerify->save();

    	return $token;
    }
}
