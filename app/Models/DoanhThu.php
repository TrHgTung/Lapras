<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoanhThu extends Model
{
    use HasFactory;

    // table nay xu li luu du lieu cho Admin doanh thu
    protected $fillable = [
        'MaDoanhThu',
        'matuyenxe', 
        'giave', 
        'ghichu', 
        'name',
        'email',
        'diemdau',
        'diemden',
        'paymentMethod',
        'dayUpdt',
        'monthUpdt',
        'yearUpdt',
    ];
    protected $table = 'DoanhThu';
    public $timestamps = false;
}
