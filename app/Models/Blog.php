<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'TieuDe',
        'NoiDung',
        'LinkThumbnail',
    ];
    protected $table = 'Blog';
    public $timestamps = false;
}
