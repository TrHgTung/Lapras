<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DuLieuThanhToan extends Model
{
    use HasFactory;

    protected $fillable = [
        'matuyenxe', 
        'giave', 
        'ghichu', 
        'name',
        'email',
        'diemdau',
        'diemden',
        'paymentMethod',
       
    ];
    protected $table = 'DuLieuThanhToan';
}
