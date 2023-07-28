<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'video_url',
        'thumbnail_image',
        'status'
    ];
}
