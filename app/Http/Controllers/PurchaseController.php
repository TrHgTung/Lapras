<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TuyenXe;
use App\Models\TaiXe;
use App\Models\PhuongTien;
use App\Models\LichSuChuyenXe;
use App\Models\DuLieuSoKhachDat;
use DB;
use Session;
use Redirect;
use Carbon\Carbon;

class PurchaseController extends Controller
{
    public function KiemTraXacThuc(){
        $uid = Session::get('id');
        if(!$uid || $uid == ''){
            return Redirect::to('/dangnhap')->send();
        }
    }

    public function PostGioHang(Request $req){ //post
        $this->KiemTraXacThuc();
        $data = array();
        $getCurrentTimeServer = Carbon::now();

        $data['email'] = $req->email;
        $data['MaTuyenXe'] = $req->MaTuyenXe;
        $data['GiaVe'] = $req->GiaVe;
        $data['Month'] = '0';
        $data['Year'] = '0';

        $insertDta = DB::table('dulieusokhachdat')->insertGetId($data);

        return Redirect::to('/giohang');
    }

    public function index(){
        $this->KiemTraXacThuc();
        $checkUser = Session::get('email');
        $getDataGioHang = DuLieuSoKhachDat::where('email', $checkUser)->get();

        return view('GioHang')->with('getDataGioHang', $getDataGioHang);
    }

    public function XoaMotItemKhoiGioHang(Request $req){ //post xóa 1 item được chọn khỏi Giỏ hàng
        $this->KiemTraXacThuc();

        $getEmail = Session::get('email');
        $getMaTuyenXe = $req->MaTuyenXe;
        //$data['GiaVe'] = $req->GiaVe;
      
        $findData = DuLieuSoKhachDat::where('email', $getEmail)->where('MaTuyenXe', $getMaTuyenXe)->first();
        $findData->delete();
        
        return Redirect::to('/giohang');
    }

    public function DiDenThanhToan(Request $req){ // chọn 1 item để đi tới Thanh toán
        //
    }
}
