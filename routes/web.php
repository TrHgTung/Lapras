<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PurchaseController;
// ADMIN
use App\Http\Controllers\Admin\AuthenticateController as AdminAuthenticate;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserManagementController as UMController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Trang chu
Route::get('/', [HomeController::class, 'index']);
Route::get('/khoiphuctk', [HomeController::class, 'KhoiPhucMail']);
Route::post('/khoiphucPost', [HomeController::class, 'KhoiPhucTK']);

// Dang ky tai khoan
Route::get('/dangky', [AuthenticateController::class, 'ViewDangKy']);
Route::post('/dangkyPost', [AuthenticateController::class, 'DangKy'])->middleware('throttle:customRateLim');

// Dang nhap tai khoan
Route::get('/dangnhap', [AuthenticateController::class, 'ViewDangNhap']);
Route::post('/dangnhapPost', [AuthenticateController::class, 'DangNhap'])->middleware('throttle:5,1');

// custom error (429 limit)
Route::get('/youdontwannacomehere', function(){
    return view('errors.429');
});

// dang xuat
Route::get('/dangxuat', [AuthenticateController::class, 'DangXuat']);

// tai khoan
Route::get('/taikhoan', [UserController::class, 'XemTaiKhoan']);
Route::get('/suataikhoan', [UserController::class, 'ViewSuaTaiKhoan']);
Route::get('/vohieuhoataikhoan', [UserController::class, 'VoHieuHoaTaiKhoan']);
Route::post('/suataikhoanPost', [UserController::class, 'SuaTaiKhoan']);
Route::post('/e11fd8c8d000e92drsa', [UserController::class, 'VoHieuHoaTaiKhoan_Action']);

// lien he phan hoi
Route::get('/phanhoi', [FeedbackController::class, 'ViewPhanHoi']);
Route::post('/phanhoiPost', [FeedbackController::class, 'PhanHoi']);

// lich dat xe
Route::get('/lichdatxe', [CalendarController::class, 'LichDatXe']);
Route::post('/lichdatxePost', [CalendarController::class, 'GetData']); 
Route::post('/chonthang', [CalendarController::class, 'ChonThang']);

// them gio hang
Route::post('/addgiohang', [PurchaseController::class, 'PostGioHang']);
Route::get('/giohang', [PurchaseController::class, 'index']);
Route::post('/hshe8r9jjff0098443/forcethanhtoan', [PurchaseController::class, 'DiDenThanhToan']);
Route::post('/hd7374748hfj899494/forcexoagiohang', [PurchaseController::class, 'XoaMotItemKhoiGioHang']);

// Thanh toan
Route::post('/hshe8r9jjff0098443/forcethanhtoan/postpaymentcontent', [PurchaseController::class, 'PostThongTinThanhToan']);
Route::post('/transaction/payment/controller/hshe8r9jjff0098443', [PurchaseController::class, 'ClearDuLieuThanhToanCaNhan']);
Route::post('/transaction/payment/cancel', [PurchaseController::class, 'HuyGiaoDich']);

// Thank you
Route::get('/thanks', [PurchaseController::class, 'SayThanks']);


// ADMIN
Route::get('/admin', [BaseController::class, 'main']);

// Dang nhap tai khoan
Route::get('/admin/dangnhap', [AdminAuthenticate::class, 'ViewDangNhap']);
Route::post('/admin/dangnhapPost', [AdminAuthenticate::class, 'DangNhap'])->middleware('throttle:customRateLim');

// dang xuat
Route::get('/dangxuatAdmin', [AdminAuthenticate::class, 'DangXuat']);

// dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index']);
// quan ly chuyen
Route::get('/admin/quanlychuyen', [DashboardController::class, 'QuanLyChuyen']);
Route::post('/admin/luuchuyen', [DashboardController::class, 'LuuChuyen']);
// them admin
Route::get('/admin/quanlyadmin', [AdminAuthenticate::class, 'ViewThemAdmin']);
Route::post('/admin/themadmin', [AdminAuthenticate::class, 'ThemAdmin'])->middleware('throttle:customRateLim');
// quan ly User
Route::get('/admin/quanlykhachhang', [UMController::class, 'index']);
Route::post('/admin/khoiphuckhachhang', [UMController::class, 'HieuLucUser']);
//quan ly tuyen
Route::get('/admin/quanlytuyen', [DashboardController::class, 'QuanLyTuyen']);
Route::get('/admin/xemtoanbotuyen', [DashboardController::class, 'XemToanTuyen']); //Xem toàn bộ tuyến
Route::post('/admin/themtuyen', [DashboardController::class, 'ThemTuyen']);
Route::post('/admin/xoatuyen', [DashboardController::class, 'XoaTuyen']);

//quan ly Phuong tien
Route::get('/admin/quanlyphuongtien', [DashboardController::class, 'QuanLyPhuongTien']);
Route::post('/admin/themphuongtien', [DashboardController::class, 'ThemPhuongTien']);
Route::post('/admin/xoaphuongtien', [DashboardController::class, 'XoaPhuongTien']);
Route::post('/admin/hieulucphuongtien', [DashboardController::class, 'HieuLucPhuongTien']);
Route::get('/admin/suaphuongtien/{id}', [DashboardController::class, 'SuaPhuongTien']);
Route::post('/admin/updatephuongtien', [DashboardController::class, 'UpdatePhuongTien']);
//quan ly Tai xe
Route::get('/admin/quanlytaixe', [DashboardController::class, 'QuanLyTaiXe']);
Route::post('/admin/themtaixe', [DashboardController::class, 'ThemTaiXe']);
Route::post('/admin/xoataixe', [DashboardController::class, 'XoaTaiXe']);
Route::post('/admin/hieuluctaixe', [DashboardController::class, 'HieuLucTaiXe']);
Route::get('/admin/suataixe/{id}', [DashboardController::class, 'SuaTaiXe']);
Route::post('/admin/updatetaixe', [DashboardController::class, 'UpdateTaiXe']);