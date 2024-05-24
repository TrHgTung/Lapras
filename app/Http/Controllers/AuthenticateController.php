<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Http\Requests\UserRegistrationValidation;

class AuthenticateController extends Controller
{
    // dang ky
    public function ViewDangKy(){
        
        return view('DangKy');
    }

    public function DangKy(UserRegistrationValidation $req){
        //Session::forget('email_validation');
        $emailInput = $req->email;
        $getAllUserEmail = User::pluck('email');

        $emailExists = $getAllUserEmail->contains($emailInput); // kiem tra email input da ton tai hay chua


        if(!$emailExists){ // neu email chua ton tai -> OK
            // validation
            // $this->validate($req, [
            //     'name' => 'required|max:30|min:2',
            //     'email' => 'required|max:50|min:5',
            //     'password' => 'required|max:50|min:6',
            // ]);

            $data = array();

            $data['is_active'] = $req->is_active;
            $data['name'] = $req->name;
            $data['email'] = $req->email;
            $data['password'] = md5($req->password);

            $user = DB::table('users')->insertGetId($data);

            return Redirect::to('/dangnhap');
        }
        else{
            $validationMsg = "Email đã tồn tại";
            Session::put('email_validation', $validationMsg);

            return Redirect::to('/dangky');
        }

    }

    // dang nhap 
    public function ViewDangNhap(){
        Session::forget('email_validation');
        return view('DangNhap');
    }

    public function DangNhap(Request $req){
        $data = array();

        $email = $req->email;
        $password = md5($req->password);

        $result = DB::table('users')->where('email', $email)->where('password', $password)->where('is_active', '1')->first();
        $check_ban_account = DB::table('users')->where('email', $email)->where('password', $password)->where('is_active', '0')->first();
        if($result){
            Session::put('id', $result->id);
            Session::put('name', $result->name);
            Session::put('email', $result->email);

            return Redirect::to('/'); // tro ve trang chu, nhung da co Session roi
        }
        else if($check_ban_account){
            $msg = "Tài khoản này đã bị khóa hoặc không hợp lệ";
            Session::put('msg', $msg);
            return Redirect::to('/dangnhap');
        }
        else{
            Session::put('msg', 'Sai thông tin đăng nhập!');
            return Redirect::to('/dangnhap');
        }

       // return Redirect::to('/');
    }

    //dang xuat
    public function DangXuat(){
        Session::flush();

        return Redirect::to('/');
    }
}
