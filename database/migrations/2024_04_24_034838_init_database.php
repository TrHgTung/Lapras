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
        Schema::create('TuyenXe', function(Blueprint $table){
            $table->id();
            $table->string('DiemDau');
            $table->string('DiemDen');
            $table->string('KhuHoi');
            $table->string('GiaVe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TuyenXe');
    }
};
