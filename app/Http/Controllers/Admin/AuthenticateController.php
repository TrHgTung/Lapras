<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin;
use App\Http\Requests\Admin\AdminRegistrationValidation;


class AuthenticateController extends Controller
{
    public function KiemTraXacThucNguoiDung(){ // nếu đã có phiên của user thì ko cho access vô admin
        $uid = Session::get('id');
        if($uid || $uid != ''){
            return Redirect::to('/')->send();
        }
    }
    // dang nhap 
    public function ViewDangNhap(){
        $this->KiemTraXacThucNguoiDung();
        return view('Admin.DangNhap');
    }

    public function DangNhap(Request $req){
        $data = array();

        $email = $req->email;
        // $password = md5($req->password); // md5 hash
        $password = ($req->password);

        $result = DB::table('admin')->where('email', $email)->where('password', $password)->where('is_active','1')->first();
        $result_check_banned_account = DB::table('admin')->where('email', $email)->where('password', $password)->where('is_active','0')->first();
        if($result){
            // Session::put('admin_id', $result->id);
            Session::put('admin_name', $result->name);
            Session::put('admin_email', $result->email);
            Session::put('admin_is_master', $result->is_master);

            return Redirect::to('/admin/dashboard'); // login admin thanh cong
        }
        else if($result_check_banned_account){
            $msg = "Tài khoản này đã bị khóa";
            Session::put('message_ban_notify', $msg);
            return Redirect::to('/admin/dangnhap');
        }
        else{
            // Session::put('msg', 'Sai thông tin đăng nhập!');
            return Redirect::to('/admin/dangnhap');
        }

       // return Redirect::to('/');
    }

    //dang xuat
    public function DangXuat(){
        Session::flush();

        return Redirect::to('/admin/dangnhap');
    }

    public function KiemTraXacThucAdmin(){
        $admin_check = Session::get('admin_email');
        if($admin_check == NULL || $admin_check == ''){
            return Redirect::to('/admin/dangnhap')->send();
        }
    }

    public function ViewThemAdmin(){
        $this->KiemTraXacThucAdmin();
        Session::forget('admin_email_validation');
       
        $getAdmin = Admin::all();
        return view('Admin.Components.QuanLiAdmin')->with('getAdmin', $getAdmin);
    }

    public function ThemAdmin(AdminRegistrationValidation $req){
        $this->KiemTraXacThucAdmin();
        $emailInput = $req->email;
        $getAllAdminEmail = Admin::pluck('email');

        $emailExists = $getAllAdminEmail->contains($emailInput); // kiem tra email input da ton tai hay chua

        if(!$emailExists){
            $data = array();

            $data['is_active'] = $req->is_active;
            $data['name'] = $req->name;
            $data['email'] = $req->email;
            $data['password'] = ($req->password);
            $data['is_master'] = '0';

            $success_admin_added = "Tài khoản đã được thêm mới thành công";
            Session::put('success_admin_added', $success_admin_added);

            $user = DB::table('admin')->insertGetId($data);

            return Redirect::to('/admin/quanlyadmin');
        }
        else{
            $validationMsg = "Email đã tồn tại";
            Session::put('admin_email_validation', $validationMsg);

            return Redirect::to('/admin/quanlyadmin');
        }
        
        
    }

    public function DisableAdminAccount(Request $req){
        $this->KiemTraXacThucAdmin();
        $getAID = $req->admin_id;
        $queryUpdate = Admin::where('id', $getAID)->update(array('is_active' => '0'));

        return Redirect::to('/admin/quanlyadmin');
    }

    public function ReActivateAdminAccount(Request $req){
        $this->KiemTraXacThucAdmin();
        $getAID = $req->admin_id;
        $queryUpdate = Admin::where('id', $getAID)->update(array('is_active' => '1'));

        return Redirect::to('/admin/quanlyadmin');
    }
}
