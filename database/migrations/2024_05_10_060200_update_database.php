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
            $table->string('DiemDau');
            $table->string('DiemDen');
            $table->string('NgayKhoiHanh');
            $table->string('ThangKhoiHanh');
            $table->string('GioKhoiHanh');
            $table->string('GioToiNoi');
            $table->string('SoKhachDat');
            $table->string('GiaVe');
        });
        Schema::create('Feedback', function(Blueprint $table){
            $table->id();
            $table->string('addressFrom');
            $table->string('feedbackContent');
           
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
