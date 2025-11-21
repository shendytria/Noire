<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    // Field yang bisa diisi massal
    protected $fillable = [
        'name',
        'position',
        'content',
        'photo',
    ];
}
