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
        'NgayKhoiHanh', // NgayKhoiHanh cua table TuyenXe
        'ThangKhoiHanh',// ThangKhoiHanh cua table TuyenXe
        'GioKhoiHanh',// GioKhoiHanh cua table TuyenXe
        'MaSoXe', // id cua table PhuongTien
        'MaTaiXe',// id cua table TaiXe
        
    ];
    protected $table = 'LichSuChuyenXe';
}
