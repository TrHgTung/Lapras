<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TuyenXe;
use App\Models\TaiXe;
use App\Models\PhuongTien;
use App\Models\LichSuChuyenXe;
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
        $getChuyenXe = LichSuChuyenXe::all();
        $getTaiXe = TaiXe::all();
        $getPhuongTien = PhuongTien::all();
        $getTuyenXe = TuyenXe::all(); // Lấy dữ liệu Tuyến để hiển thị view, xong form post để truyền lưu dữ liệu vào Lịch sử chuyến
        // dd($getTuyenXe);
        return view('Admin.Components.QuanLyChuyen')->with('getTuyenXe',$getTuyenXe)->with('getPhuongTien', $getPhuongTien)->with('getTaiXe', $getTaiXe)->with('getChuyenXe', $getChuyenXe);
    }
    //POST
    public function LuuChuyen(Request $req){
        $this->KiemTraXacThucAdmin();
        $data = array();

        $data['MaTuyenXe'] = $req->MaTuyenXe;
        $data['NgayKhoiHanh'] = $req->NgayKhoiHanh;
        $data['ThangKhoiHanh'] = $req->ThangKhoiHanh;
        $data['GioKhoiHanh'] = ($req->GioKhoiHanh);
        $data['GioToiNoi'] = ($req->GioToiNoi);
        $data['MaSoXe'] = ($req->MaSoXe);
        $data['MaTaiXe'] = ($req->MaTaiXe);
        $data['status'] = ($req->status);
       
        $user = DB::table('lichsuchuyenxe')->insertGetId($data);

        return Redirect::to('/admin/quanlychuyen');
    }


    public function QuanLyTuyen(){
        $this->KiemTraXacThucAdmin();
        $getTuyenXe = TuyenXe::all();
        // dd($getTuyenXe);
        return view('Admin.Components.QuanLyTuyen')->with('getTuyenXe',$getTuyenXe);
    }
}
