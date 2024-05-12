<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiXe extends Model
{
    use HasFactory;
    protected $fillable = [
        'MaTaiXe',
        'HoTenTaiXe',  
    ];
    protected $table = 'taixe';
}
