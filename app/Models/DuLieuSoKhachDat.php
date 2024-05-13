<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DuLieuSoKhachDat extends Model
{
    use HasFactory;
    protected $fillable = [
        'email', // email cua table users
        'MaTuyenXe', // MaTuyenXe cua table TuyenXe
        'GiaVe', // GiaVe cua table TuyenXe
        'Month', // luu tu form
        'Year', // luu tu form
    ];
    protected $table = 'DuLieuSoKhachDat';
}
