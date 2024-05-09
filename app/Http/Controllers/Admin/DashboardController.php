<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TuyenXe;
use DB;

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

    public function index(){
        return view('Admin.Components.Dashboard');
    }
    public function QuanLyChuyen(){
        // $getTuyenXe = DB::table('tuyenxe')->get();
        $getTuyenXe = TuyenXe::all();
        // dd($getTuyenXe);
        return view('Admin.Components.QuanLyChuyen')->with('getTuyenXe',$getTuyenXe);
    }
}
