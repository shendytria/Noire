<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // Field yang bisa diisi massal
    protected $fillable = [
        'title',
        'slug',
        'author',
        'content',
        'image',
    ];
}
