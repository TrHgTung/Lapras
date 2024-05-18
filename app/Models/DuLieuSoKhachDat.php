<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DuLieuSoKhachDat extends Model
{
    use HasFactory;
    protected $fillable = [
        'MaGioHang',
        'email', // email cua table users
        'MaTuyenXe', // MaTuyenXe cua table TuyenXe
        'GiaVe', // GiaVe cua table TuyenXe
        'TimeUpdt', // luu tu form - thoigian luu gio hang
    ];
    protected $table = 'DuLieuSoKhachDat';
}
