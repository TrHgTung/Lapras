<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\CalendarController;
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
Route::post('/dangkyPost', [AuthenticateController::class, 'DangKy']);

// Dang nhap tai khoan
Route::get('/dangnhap', [AuthenticateController::class, 'ViewDangNhap']);
Route::post('/dangnhapPost', [AuthenticateController::class, 'DangNhap']);

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
// Route::get('/lichdatxeTest', [CalendarController::class, 'GetData']); 

// ADMIN
Route::get('/admin', [BaseController::class, 'main']);

// Dang nhap tai khoan
Route::get('/admin/dangnhap', [AdminAuthenticate::class, 'ViewDangNhap']);
Route::post('/admin/dangnhapPost', [AdminAuthenticate::class, 'DangNhap']);

// dang xuat
Route::get('/dangxuatAdmin', [AdminAuthenticate::class, 'DangXuat']);

// dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index']);
// quan ly chuyen
Route::get('/admin/quanlychuyen', [DashboardController::class, 'QuanLyChuyen']);
// them admin
Route::get('/admin/quanlyadmin', [AdminAuthenticate::class, 'ViewThemAdmin']);
Route::post('/admin/themadmin', [AdminAuthenticate::class, 'ThemAdmin']);
// quan ly User
Route::get('/admin/quanlykhachhang', [UMController::class, 'index']);