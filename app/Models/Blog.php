<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'slug',
        'title',
        'topic',
        'image',
        'tags',
        'written_by',
        'writter_position',
        'writter_image',
        'facebook_link',
        'twitter_link',
        'printrest_link',
        'instagram_link',
        'short_description',
        'description',
        'is_publish',
    ];
}
