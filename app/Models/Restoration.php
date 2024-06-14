<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restoration extends Model
{
    use HasFactory;

    protected $fillable = [
        'Email', // email khoi phuc
        'Code', // code khoi ph
        'InitTimePoint', // thoi gian tao code
        'status', // trang thai
        
    ];
    protected $table = 'Restoration';
    public $timestamps = false;
}
