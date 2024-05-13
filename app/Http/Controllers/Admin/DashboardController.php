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
use Carbon\Carbon;

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
        // $getChuyenXe = LichSuChuyenXe::all();
        $getTaiXe = TaiXe::all();
        $getPhuongTien = PhuongTien::all();
        $getTuyenXe = TuyenXe::all(); // Lấy dữ liệu Tuyến để hiển thị view, xong form post để truyền lưu dữ liệu vào Lịch sử chuyến
        // dd($getTuyenXe);
        return view('Admin.Components.QuanLyChuyen')->with('getTuyenXe',$getTuyenXe)->with('getPhuongTien', $getPhuongTien)->with('getTaiXe', $getTaiXe);
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

        $getMaTX = $req->MaTuyenXe;
        $add_to_tuyenxe = ($req->status);
        TuyenXe::where('MaTuyenXe', $getMaTX)->update(array('status' => $add_to_tuyenxe));
        
       
        $user = DB::table('lichsuchuyenxe')->insertGetId($data);

        return Redirect::to('/admin/quanlychuyen');
    }


    public function QuanLyTuyen(){
        $this->KiemTraXacThucAdmin();
        $getTuyenXe = TuyenXe::all();
        $getCurrentMonthServer = Carbon::now()->month;
        $getCurrentYearServer = Carbon::now()->year;
        // dd($getTuyenXe);
        return view('Admin.Components.QuanLyTuyen')->with('getTuyenXe',$getTuyenXe)->with('getCurrentMonthServer',$getCurrentMonthServer)->with('getCurrentYearServer',$getCurrentYearServer);
    }

    public function XemToanTuyen(){
        $this->KiemTraXacThucAdmin();
        $getTuyenXe = TuyenXe::all();

        return view('Admin.Components.XemToanTuyen')->with('getTuyenXe',$getTuyenXe);
    }

    public function ThemTuyen(Request $req){
        $this->KiemTraXacThucAdmin();
        $data = array();

        $data['MaTuyenXe'] = $req->MaTuyenXe;
        $data['DiemDau'] = $req->DiemDau;
        $data['DiemDen'] = $req->DiemDen;
        $data['NgayKhoiHanh'] = $req->NgayKhoiHanh;
        $data['ThangKhoiHanh'] = $req->ThangKhoiHanh;
        $data['GioKhoiHanh'] = ($req->GioKhoiHanh);
        $data['GioToiNoi'] = ($req->GioToiNoi);
        $data['GiaVe'] = ($req->GiaVe);
        $data['status'] = ($req->status);

        $msg = "Đã thêm thành công";
        Session::put('success_route_added', $msg);
        $user = DB::table('tuyenxe')->insertGetId($data);

        return Redirect::to('/admin/quanlytuyen');
    }
    public function XoaTuyen(Request $req){
        $getMaTuyenXe = $req->MaTuyenXe;
        $getTuyenXe = TuyenXe::where('MaTuyenXe', $getMaTuyenXe)->update(array('status' => 'cancel'));
        //$getTuyenXe->delete(); // không nên dùng phương thức delete, vì sẽ không khôi phục được du lieu
        return Redirect::to('/admin/xemtoanbotuyen');
    }

    // quan ly phuong tien
    public function QuanLyPhuongTien(){
        $this->KiemTraXacThucAdmin();
        $getPhuongTien = PhuongTien::all();
        // dd($getTuyenXe);
        return view('Admin.Components.QuanLyPhuongTien')->with('getPhuongTien',$getPhuongTien);
    }

    public function ThemPhuongTien(Request $req){
        $this->KiemTraXacThucAdmin();
        $data = array();

        $data['MaSoXe'] = $req->MaSoXe;
        
        $data['HangXe'] = $req->HangXe;
        $data['SoGhe'] = ($req->SoGhe);
        $data['HanDangKiem'] = ($req->HanDangKiem);
       
        $msg = "Đã thêm thành công";
        Session::put('success_vehicle_added', $msg);
        $user = DB::table('phuongtien')->insertGetId($data);

        return Redirect::to('/admin/quanlyphuongtien');
    }

    // quan ly tai xe
    public function QuanLyTaiXe(){
        $this->KiemTraXacThucAdmin();
        $getTaiXe = TaiXe::all();
        // dd($getTuyenXe);
        return view('Admin.Components.QuanLyTaiXe')->with('getTaiXe',$getTaiXe);
    }

    public function ThemTaiXe(Request $req){
        $this->KiemTraXacThucAdmin();
        $data = array();

        $data['MaTaiXe'] = $req->MaTaiXe;
        $data['HoTenTaiXe'] = $req->HoTenTaiXe;

        $msg = "Đã thêm thành công";
        Session::put('success_driver_added', $msg);
        $user = DB::table('taixe')->insertGetId($data);

        return Redirect::to('/admin/quanlytaixe');
    }
}
