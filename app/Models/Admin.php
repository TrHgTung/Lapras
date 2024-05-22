<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
        'is_master',
    ];
    protected $hidden = [
        'password',
    ];
    public $timestamps = false;
    protected $table = 'admin';
}
