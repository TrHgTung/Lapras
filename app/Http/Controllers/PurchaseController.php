<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TuyenXe;
use App\Models\TaiXe;
use App\Models\PhuongTien;
use App\Models\LichSuChuyenXe;
use App\Models\DuLieuSoKhachDat;
use App\Models\User;
use App\Models\DuLieuThanhToan;
use App\Models\DoanhThu;
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
        $getMaTuyenXe = $req->MaTuyenXe;
        $data['GiaVe'] = $req->GiaVe;
        $data['TimeUpdt'] = $getCurrentTimeServer;

        $is_exist = DuLieuSoKhachDat::where('MaTuyenXe', $getMaTuyenXe)->exists(); // kiem tra trung lap

        if ($is_exist) { // neu khach đặt trùng tuyến xe
            return Redirect::to('/giohang');
            // return redirect()->back()->withErrors(['MaTuyenXe_exist' => 'Bạn đã đặt tuyến này rồi']);
        }
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
        $this->KiemTraXacThuc();

        $data = array();
        $data['email'] = Session::get('email');
        $data['MaTuyenXe'] = $req->MaTuyenXe;
        $data['GiaVe'] = $req->GiaVe;

        // get user data from Model
        $getUserfromSession = Session::get('email');
        $getMaTuyenXee =  $req->MaTuyenXe;
        $getLocation = TuyenXe::where('MaTuyenXe', $getMaTuyenXee)->first();
        // $getUserfromSession = 'beo@mail.com'; // for checking query
        $getUser = User::where('email', $getUserfromSession)->first();
      
        // return dd($getUser);
        // return dd($data);
       return view('ThanhToan')->with('dataThanhToan', $data)->with('getUser', $getUser)->with('getLocation', $getLocation); // pass data to view Thanh toan
    }
    public function PostThongTinThanhToan(Request $req){
        $this->KiemTraXacThuc();

        $data = array();
        $data['matuyenxe'] = $req->matuyenxe;
        $data['giave'] = $req->giave;
        $getGhiChuForm = $req->ghichu;
        if($getGhiChuForm == NULL || $getGhiChuForm == ''){
            $finalGhiChu = 'null';
        }else{
            $finalGhiChu = $getGhiChuForm;
        }

        $data['ghichu'] = $finalGhiChu;
        $data['name'] = $req->name;
        $data['email'] = $req->email;
        $data['diemdau'] = $req->diemdau;
        $data['diemden'] = $req->diemden;
        $data['paymentMethod'] = $req->paymentMethod;
        $data['timeUpdt'] = Carbon::now();

        $insertDta = DB::table('dulieuthanhtoan')->insertGetId($data);
        $checkPaymentMethod = $req->paymentMethod;

        if($checkPaymentMethod == '1'){
            // MoMo handle code ...

            $getMaTuyenXeee = $req->matuyenxe;
            $getEmailUser = $req->email;
            $UpdtData = DuLieuThanhToan::where('matuyenxe', $getMaTuyenXeee)->where('email', $getEmailUser)->first();
            // Create Model DoanhThu: -> luu $UpdtData vào Model DoanhThu -> Admin Xử lí ...

            $UpdtDoanhThu = array();
            $UpdtDoanhThu['matuyenxe'] = $UpdtData->matuyenxe;
            $UpdtDoanhThu['giave'] = $UpdtData->giave;
            $UpdtDoanhThu['ghichu'] = $UpdtData->ghichu;
            $UpdtDoanhThu['name'] = $UpdtData->name;
            $UpdtDoanhThu['email'] = $UpdtData->email;
            $UpdtDoanhThu['diemdau'] = $UpdtData->diemdau;
            $UpdtDoanhThu['diemden'] = $UpdtData->diemden;
            $UpdtDoanhThu['paymentMethod'] = $UpdtData->paymentMethod;
            $UpdtDoanhThu['timeUpdt'] = Carbon::now();
            DB::table('doanhthu')->insertGetId($UpdtDoanhThu);

            $UpdtData->delete();

            return Redirect::to('/lichdatxe');
            //return dd($UpdtData);
        }
        else{
            // Pay tien mat truc tiep
            return view('ThankYou');
        }
    }
}
