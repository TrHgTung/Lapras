<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TuyenXe;
use DB;
use Session;
use Redirect;

class DashboardController extends Controller
{
    
    public function KiemTraXacThuc(){
        $uid = Session::get('id'); // user check
        $admin_check = Session::get('admin_email'); // admin check
        if($admin_check || $admin_check != ''){ // xu ly chinh
            return Redirect::to('/admin/dashboard')->send();
        }
        
        else if($uid || $uid != ''){
            return Redirect::to('/')->send();
        }
        else if(!$admin_check || $admin_check == ''){
            return Redirect::to('/admin/dangnhap')->send();
        }
        else{
            throw ValidationException::withMessages(['Error']);
        }
    }
    public function KiemTraXacThucAdmin(){
            $admin_check = Session::get('admin_email');
            if($admin_check == NULL || $admin_check == ''){
                return Redirect::to('/admin/dangnhap')->send();
            }
    }

    public function index(){
        $this->KiemTraXacThucAdmin();
        return view('Admin.Components.Dashboard');
    }
    public function QuanLyChuyen(){
        $this->KiemTraXacThucAdmin();
        
        // dd($getTuyenXe);
        return view('Admin.Components.QuanLyChuyen');
    }
    public function QuanLyTuyen(){
        $this->KiemTraXacThucAdmin();
        $getTuyenXe = TuyenXe::all();
        // dd($getTuyenXe);
        return view('Admin.Components.QuanLyTuyen')->with('getTuyenXe',$getTuyenXe);
    }
}
