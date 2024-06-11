<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(){
        Session::forget('email_validation');
        // Feedback::all();
        $getFeedback = DB::table('feedback')->limit(10)->get(); // chỉ lấy 10 item
        return view('TrangChu')->with('getFeedback', $getFeedback);
    }

    public function KhoiPhucMail(){
        return view('KhoiPhucTK');
    }

    public function KhoiPhucTK(Request $req){
        //$this->KiemTraXacThuc();

        $receive_mail = $req->receive;
        $host_mail = '******@gmail.com'; //mail cua ban
        $app_password = '*********';

        $data = array();
        $data['addressFrom'] =  $receive_mail;
        try {
            $mail = new PHPMailer(true);
            $mail->CharSet = "UTF-8";
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $host_mail;                     //SMTP username
            $mail->Password   = $app_password;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom($host_mail, 'Admin');
            $mail->addAddress($receive_mail);     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Cảm ơn bạn đã phản hồi';
            $mail->Body    = 'Chúng tôi sẽ khôi phục lại tài khoản này: '.$receive_mail.'<br> Xin cảm ơn!';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            // echo 'Success';
        } catch (Exception $e) {
            echo "Message could not be sent.";
        }

        return Redirect::to('/');
    }

    public function Test123(){
        return view('errors.easteregg');
    }

    public function MiniGame(){
        $initPromoCode = "PROMO".str_replace("-", "", (string)rand(11111,9999).(string)Carbon::now()->toDateString());
        
        //return dd($initPromoCode);
        return view('MiniGame', compact('initPromoCode'));
    }
}
