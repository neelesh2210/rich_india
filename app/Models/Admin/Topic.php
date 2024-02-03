<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'thumbnail_image',
        'cover_image',
        'is_url',
        'video_url',
        'pdf',
        'description',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'status',
        'delete_status',
    ];

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }
}
