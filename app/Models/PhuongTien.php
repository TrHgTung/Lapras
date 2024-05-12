<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuongTien extends Model
{
    use HasFactory;
    protected $fillable = [
        'MaSoXe', // mã số biển xe
        'HangXe', // hãng hiệu của xe
        'SoGhe', // số ghế ngồi
        'HanDangKiem', // thời hạn đăng kiểm xe
        
    ];
    protected $table = 'PhuongTien';
}
