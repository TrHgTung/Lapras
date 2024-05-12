<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DuLieuSoKhachDat extends Model
{
    use HasFactory;
    protected $fillable = [
        'MaChuyenXe', // id cua table LichSuChuyenXe
        'SoKhachDat', // so luong khach dat chuyen
    ];
    protected $table = 'DuLieuSoKhachDat';
}
