<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuyenXe extends Model
{
    use HasFactory;

    protected $fillable = [
        'MaTuyenXe',
        'DiemDau',
        'DiemDen',
        'NgayKhoiHanh',
        'ThangKhoiHanh',
        'GioKhoiHanh',
        'GioToiNoi',
        //'SoKhachDat',
        'GiaVe'
    ];
    protected $table = 'tuyenxe';
}
