<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class AuthenticateController extends Controller
{
    // dang ky
    public function ViewDangKy(){
        return view('DangKy');
    }

    public function DangKy(Request $req){
        $data = array();

        $data['is_active'] = $req->is_active;
        $data['name'] = $req->name;
        $data['email'] = $req->email;
        $data['password'] = md5($req->password);

        $user = DB::table('users')->insertGetId($data);

        return Redirect::to('/dangnhap');
    }

    // dang nhap 
    public function ViewDangNhap(){
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
