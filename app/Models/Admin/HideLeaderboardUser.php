<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HideLeaderboardUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];
}
