<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelUpWallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'from_id',
        'amount',
        'type',
        'from',
        'remark',
        'delete_status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
