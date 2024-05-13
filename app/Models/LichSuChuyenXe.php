<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSuChuyenXe extends Model
{
    use HasFactory;
    // day la table luu lai thong tin cac chuyen da chay
    protected $fillable = [
        'MaTuyenXe', // id cua table TuyenXe
        'NgayKhoiHanh', // NgayKhoiHanh thuc te
        'ThangKhoiHanh',// ThangKhoiHanh thuc te
        'GioKhoiHanh',// GioKhoiHanh thuc te
        'GioToiNoi',// GioToiNoi thuc te
        'MaSoXe', // Xe thuc te
        'MaTaiXe',// Tai xe thuc te
        'status',// Trang thai chuyen xe
        'NguoiCapNhat',// Trang thai chuyen xe
        'ThoiDiemCapNhat',// Trang thai chuyen xe
    ];
    protected $table = 'LichSuChuyenXe';
}
