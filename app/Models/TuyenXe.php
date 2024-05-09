<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuyenXe extends Model
{
    use HasFactory;

    protected $fillable = [
        'DiemDau',
        'DiemDen',
        'KhuHoi',
        'GiaVe'
    ];
    protected $table = 'tuyenxe';
}
