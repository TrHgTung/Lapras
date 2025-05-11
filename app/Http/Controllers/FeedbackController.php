<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class FeedbackController extends Controller
{
    public function KiemTraXacThuc(){
        $uid = Session::get('id');
        if(!$uid || $uid == ''){
            return Redirect::to('/dangnhap')->send();
        }
    }

    public function ViewPhanHoi(){
        $this->KiemTraXacThuc();
        return view('FormGuiMailPhanHoi');
    }

    public function PhanHoi(Request $req){
        $this->KiemTraXacThuc();
        $master_admin = DB::table('admin')
                            ->where('is_master', 1)
                            ->first();

        $umail = Session::get('email');
        $content = $req->content;
        $host_mail = $master_admin->email; // mail cua ban
        $host_password = $master_admin->smtp_password; // google app passwords

        $data = array();
        $data['addressFrom'] =  $umail;
        $data['feedbackContent'] = $content;
        $save = DB::table('Feedback')->insertGetId($data); 
       
        // DB::table('users')->where('id', $uid)->update($data);
        try {
            $mail = new PHPMailer(true);
            $mail->CharSet = "UTF-8";
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $host_mail;                     //SMTP username
            $mail->Password   = $host_password;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom($host_mail, 'Admin');
            $mail->addAddress($umail);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
        
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Cảm ơn bạn đã phản hồi';
            $mail->Body    = 'Ý kiến của bạn đã được ghi nhận. Xin cám ơn!';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            // echo 'Success';
        } catch (Exception $e) {
            echo "Message could not be sent.";
        }

        return Redirect::to('/');
    }
}
