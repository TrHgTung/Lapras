<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class UserController extends Controller
{
    public function KiemTraXacThuc(){
        $uid = Session::get('id');
        if(!$uid || $uid == ''){
            return Redirect::to('/dangnhap')->send();
        }
    }

    public function XemTaiKhoan(){
        $this->KiemTraXacThuc();
        return view('XemTaiKhoan');
    }

    public function ViewSuaTaiKhoan(){
        $this->KiemTraXacThuc();
        return view('SuaTaiKhoan');
    }

    public function SuaTaiKhoan(Request $req){
        $this->KiemTraXacThuc();
        $uid = Session::get('id');
        $data = array();
        $data['email'] = $req->email; 
        $data['password'] = md5($req->password); 

        if($data['email'] != '' || $data['password'] != '' || ($data['email'] != '' && $data['password'] != '')){
            DB::table('users')->where('id', $uid)->update($data);
            Session::put('email', $req->email);
            
        }
        
        return Redirect('/taikhoan');
    }

    public function VoHieuHoaTaiKhoan(){
        $this->KiemTraXacThuc();
        return view('VoHieuHoaTaiKhoan');
    }

    public function VoHieuHoaTaiKhoan_Action(Request $req){
        $this->KiemTraXacThuc();

        $getUserId = (int)$req->uid;
        $user = User::find($getUserId);

        if($user) {
            $user->is_active = '0';
            $user->save();
            return Redirect::to('/dangxuat');
        }
        return Redirect::to('/');
    }
}
