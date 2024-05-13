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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('is_active');
            $table->rememberToken();
            $table->timestamps();
        });
        
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
            $table->string('MaChuyenXe');
            $table->Integer('SoKhachDat');
           
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
