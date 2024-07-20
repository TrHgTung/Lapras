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
        // xac dinh MaGioHang
        $rand = rand(1,9999);
        $dtaEmailUser = Session::get('email');
        $xuLyEmail = str_replace(['@', '.'], '', $dtaEmailUser);
        $xuLyNgayThangNam = Carbon::now()->toDateTimeString();
        $ngayThangNamDaXuLy = str_replace(['-', ':'], '', $xuLyNgayThangNam);
        $init_MaGioHang = $rand.$ngayThangNamDaXuLy.$xuLyEmail;

        $data['MaGioHang'] = $init_MaGioHang;

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
      
       $getMaGioHang  = DuLieuSoKhachDat::where('email', $getUserfromSession)->where('MaTuyenXe', $getMaTuyenXee)->first();
       $getONLY_MaGioHang = $getMaGioHang->MaGioHang;
// return dd($getONLY_MaGioHang);
       return view('ThanhToan')->with('dataThanhToan', $data)->with('getUser', $getUser)->with('getLocation', $getLocation)->with('MaGioHang', $getONLY_MaGioHang); // pass data to view Thanh toan
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

        // xử lý Mã Thanh toán
        $randNumber = rand(0,9999);
        $xuLyEmail = str_replace(['@', '.'], '', $req->email);
        $xuLyNgayThangNam = $randNumber.Carbon::now()->toDateTimeString().$xuLyEmail;

        $data['MaThanhToan'] = str_replace(['-', ':'], '', $xuLyNgayThangNam);
        $insertDta = DB::table('dulieuthanhtoan')->insertGetId($data);
        // $data chinh la du lieu thanh toan
        $checkPaymentMethod = $req->paymentMethod;

        if($checkPaymentMethod == '1'){
            // Payment transaction handle code ... 


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
            // $UpdtDoanhThu['dayUpdt'] = Carbon::now()->day;
            // $UpdtDoanhThu['monthUpdt'] = Carbon::now()->month;
            // $UpdtDoanhThu['yearUpdt'] = Carbon::now()->year;

            $randNumber = rand(0,9999);
            $xuLyEmail = str_replace(['@', '.'], '', $req->email);
            $xuLyNgayThangNam = Carbon::now()->toDateTimeString();
            $ngayThangNamDaXuLy = str_replace(['-', ':'], '', $xuLyNgayThangNam);
            $xuLyMaDoanhThu = $randNumber.$ngayThangNamDaXuLy.$xuLyEmail;
            $UpdtDoanhThu['MaDoanhThu'] = $xuLyMaDoanhThu;

            DB::table('doanhthu')->insertGetId($UpdtDoanhThu);

            // $UpdtData->delete(); // mang qua function khác

            // get MaGioHang
            $getDTa_MaGioHang = DuLieuSoKhachDat::where('email', $getEmailUser)->where('MaTuyenXe', $getMaTuyenXeee)->first();
            $getId_MaGioHang = $getDTa_MaGioHang->MaGioHang;

            // return Redirect::to('/lichdatxe');
            return view('Payment.ProcessingPayment')->with('data', $data)->with('MaGioHang', $getId_MaGioHang);
            //return dd($UpdtData);
        }
        else{
            // ...........
             // Pay tien mat truc tiep
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
            // $UpdtDoanhThu['dayUpdt'] = Carbon::now()->day;
            // $UpdtDoanhThu['monthUpdt'] = Carbon::now()->month;
            // $UpdtDoanhThu['yearUpdt'] = Carbon::now()->year;

            $randNumber = rand(0,9999);
            $xuLyEmail = str_replace(['@', '.'], '', $req->email);
            $xuLyNgayThangNam = Carbon::now()->toDateTimeString();
            $ngayThangNamDaXuLy = str_replace(['-', ':'], '', $xuLyNgayThangNam);
            $xuLyMaDoanhThu = $randNumber.$ngayThangNamDaXuLy.$xuLyEmail;
            $UpdtDoanhThu['MaDoanhThu'] = $xuLyMaDoanhThu;

            DB::table('doanhthu')->insertGetId($UpdtDoanhThu);

           
            // xoa gio hang tu dong
            $getEmail = $req->email;
            $getMaTuyenXe = $req->matuyenxe;
            // $getTimeUpdt = $req->timeUpdt;
            $getTimeUpdt = $xuLyNgayThangNam;
            
            // PLAN:  delete by id DuLieuSoKhachDat
            // $findData->delete(); // lỗi giỏ hàng

            // ==> SOLUTION: tạo cột MaGioHang 
            // -> truyền MaGioHang dưới dạng input:hidden qua các view để xử lý dưới controller 
            // -> Có MaGioHang -> dùng phương thức delete();
            // .............
            $getOnly_MaGioHang = $req->MaGioHang;
            $findData = DuLieuSoKhachDat::where('MaGioHang', $getOnly_MaGioHang)->first();

            $findData->delete();

            // update paymentMethod
            $getpaymentMethod = $req->paymentMethod;
            // ... dựa trên email va MaTuyenXe để update paymentMethod..
            $findDataUpdatePM = DoanhThu::where('timeUpdt', $getTimeUpdt)->update(array('paymentMethod' => $getpaymentMethod));
            
            return view('ThankYou');
            // return dd($getTimeUpdt);
        }
    }

    // Post từ form btn Nhấn để thanh toán... ( clear gio hang)
    public function ClearDuLieuThanhToanCaNhan(Request $req){
        $this->KiemTraXacThuc();
        // request data ...

        $getEmail = $req->email;
        $getMaTuyenXe = $req->matuyenxe;
        $getTimeUpdt = $req->timeUpdt;
        
        // Xoa gio hang tu dong
        $getOnly_MaGioHang = $req->MaGioHang;
        $findData = DuLieuSoKhachDat::where('MaGioHang', $getOnly_MaGioHang)->first();
        $findData->delete();

        // update paymentMethod
        $getpaymentMethod = $req->paymentMethod;
        // ... dựa trên email va MaTuyenXe để update paymentMethod..
        $findDataUpdatePM = DoanhThu::where('timeUpdt', $getTimeUpdt)->update(array('paymentMethod' => $getpaymentMethod));
        return Redirect::to('/thanks');

    }

     // Post từ form btn Hủy bỏ giao dịch
    public function HuyGiaoDich(Request $req){
        $this->KiemTraXacThuc();
        // request data ...

        $getEmail = $req->email;
        $getMaTuyenXe = $req->matuyenxe;

        //  PLAN:  delete by id DuLieuThanhToan &&  update paymentMethod = 0 -> DoanhThu 
        // delete by id DuLieuThanhToan
        // $findData = DuLieuThanhToan::where('email', $getEmail)->where('MaTuyenXe', $getMaTuyenXe)->first();
        // $findData->delete();
        // Xoa gio hang tu dong
        $getOnly_MaGioHang = $req->MaGioHang;
        $findData = DuLieuSoKhachDat::where('MaGioHang', $getOnly_MaGioHang)->first();
        $findData->delete();

        // Update paymentMethod = '0': DoanhThu
        $findDataUpdatePM = DoanhThu::where('email', $getEmail)->where('MaTuyenXe', $getMaTuyenXe)->update(array('paymentMethod' => 'null'));
        $PMCancelledMsg = "Giao dịch của bạn đã bị hủy";
        Session::put('payment_cancelled', $PMCancelledMsg);

        return Redirect::to('/giohang');
    }

    public function SayThanks(){
        $this->KiemTraXacThuc();
        return view('ThankYou');
    }
}
