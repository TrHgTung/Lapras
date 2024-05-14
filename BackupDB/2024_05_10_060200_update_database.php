<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Admin', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('is_active');
           
        });
        Schema::create('TuyenXe', function(Blueprint $table){
            $table->id();
            $table->string('MaTuyenXe');
            $table->string('DiemDau');
            $table->string('DiemDen');
            $table->string('NgayKhoiHanh');
            $table->string('ThangKhoiHanh');
            $table->string('GioKhoiHanh');
            $table->string('GioToiNoi');
            // $table->string('SoKhachDat');
            $table->string('GiaVe');
            $table->string('status');
        });
        Schema::create('Feedback', function(Blueprint $table){
            $table->id();
            $table->string('addressFrom');
            $table->string('feedbackContent');
           
        });
        Schema::create('PhuongTien', function(Blueprint $table){
            $table->id();
            $table->string('MaSoXe');
            $table->string('HangXe');
            $table->Integer('SoGhe');
            $table->string('HanDangKiem');
            $table->string('status');      
             
        });
        Schema::create('TaiXe', function(Blueprint $table){
            $table->id();
            $table->string('MaTaiXe');
            $table->string('HoTenTaiXe');
            $table->string('status');      
          
        });
        Schema::create('LichSuChuyenXe', function(Blueprint $table){
            $table->id();
            $table->string('MaTuyenXe');
            $table->string('NgayKhoiHanh');
            $table->string('ThangKhoiHanh');
            $table->string('GioKhoiHanh');
            $table->string('GioToiNoi');
            $table->string('MaSoXe');
            $table->string('MaTaiXe');
            $table->string('status');      
            $table->string('NguoiCapNhat');
            $table->string('ThoiDiemCapNhat');      
        });
        Schema::create('DuLieuSoKhachDat', function(Blueprint $table){
            $table->id();
            $table->string('email');
            $table->string('MaTuyenXe');
            $table->Integer('GiaVe'); // tổng sum GiaVe sẽ ra tổng doanh thu
            $table->string('TimeUpdt'); // thgian luu vao gio hang
        });
        Schema::create('DuLieuThanhToan', function(Blueprint $table){
            $table->id();
            $table->string('matuyenxe');
            $table->string('giave');
            $table->string('ghichu');
            $table->string('name');
            $table->string('email');
            $table->string('diemdau');
            $table->string('diemden');
            $table->string('paymentMethod');      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
