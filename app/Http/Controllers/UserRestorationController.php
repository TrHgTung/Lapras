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
use App\Models\User;
use Illuminate\Support\Collection;


class UserRestorationController extends Controller
{
    public function KhoiPhucMK(){
        return view('KhoiPhucMatKhau');
    }

    public function KhoiPhucMKPost(Request $req){
        
        $receive_mail = $req->receive;

        // kiem tra Mail co ton tai hay ko, neu ko thi yeu cau Dang ki:
        // $getAllUsrEMAIL_toCheckExistOrNot = User::pluck('email');
        $userChecked = User::where('email', $receive_mail)->first();
        if($userChecked){
            // dieu kien đúng: neu ton tai Email > khoi phuc Dang nhap
            // thiet lap SMTP

            $host_mail = '*********@gmail.com'; // sevr mail cua ban
            $app_password = '*********'; // mat khau email (SMTP)

            $data = array();

            // Tạo 1 chuỗi ngẫu nhiên để kphục pass
            $init_restoreCode = "RESTORE".rand(11111,99999).Carbon::now()->day.Carbon::now()->month.Carbon::now()->year;
            $record_TimePoint = Carbon::now()->toDateTimeString();

            // dat vao Session de so sanh xac thuc
            Session::put('receive_mail', $receive_mail);
            Session::put('init_restoreCode', $init_restoreCode);

            // lưu code, thời điểm tạo, email khôi phục vô Model (Restoration)
            $data['Email'] = $receive_mail;
            $data['Code'] = $init_restoreCode;
            $data['InitTimePoint'] = $record_TimePoint;
            $data['status'] = 1;

            DB::table('Restoration')->insertGetId($data);

            // Xu ly SMTP        
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
                $mail->Subject = '['.$record_TimePoint.'] - PHÍA DƯỚI LÀ MÃ KHÔI PHỤC MẬT KHẨU CỦA BẠN';
                $mail->Body    = 'Xin chào, đây là mã khôi phục của tài khoản: '.$receive_mail.'<br> Xin đừng công khai mã này, xin chân thành cảm ơn!<br><h2>'.$init_restoreCode.'</h2>';
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                // echo 'Success';
            } catch (Exception $e) {
                echo "Message could not be sent.";
            }
        }else{
            // yeu cau Dang ki (vi Email ko ton tai)
            return Redirect::to('/dangky');
        }

        

        // return Redirect::to('/khoiphucMK/NhapCodeKP')->with('init_restoreCode',$init_restoreCode)->with('receive_mail', $receive_mail);
        return Redirect::to('/khoiphucMK/NhapCodeKP');

        // return dd($record_TimePoint);
    }

    public function NhapCodeGet(){
        return view('NhapCodeXacMinhKhoiPhucMK');
    }

    public function NhapCodePost(Request $req){
        $data = array();

        $usrInputCode = $req->receive;
        $trueCode = $req->anitrtt_7884848488ujrriri;
        $usrEmail = $req->anitrtt_7884848488ujrriry;

        // So sanh de dan den trang thay doi mat khau
        if($usrInputCode == $trueCode){
            $sys_rand = 'SOMERANDCODE'.rand(11111,99999).Carbon::now()->day.Carbon::now()->year.Carbon::now()->month.'TUNGDZ';
            Session::forget('init_restoreCode');

            $url = url('/changePasswordEmergency', ['code' => $sys_rand]);

            // return Redirect::to('/changePasswordEmergency?='. $sys_rand);
            return Redirect::to($url);
            //return dd($url);
        }
        else{
            // Lười xử lí phần nhập sai code xac minh vcl
            Session::forget('init_restoreCode');
            Session::forget('receive_mail');

            return Redirect::to('/');
        }
        
    }

    public function ChangePasswordEmergency(){

        return view('ChangePasswordEmergency'); // form doi mat khau (sau khi nhap thanh cong ma khoi phuc)
    }

    public function DoiMatKhau(Request $req){
        // lấy dữ liệu tương ứng với user ra, lấy đủ để update tránh bị NULL dữ liệu
        $email = $req->email;
        $getUserData = User::where('email', $email)->first();

        // thiet lap de update du lieu
        $data = array();
        //$data['email'] = $req->email;
        $data['password'] = md5($req->password);
        $data['is_active'] = '1';
       
        $updtUser = User::where('email', $email)->update($data);

        return Redirect::to('/dangnhap');

    }
}
