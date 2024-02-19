<?php

namespace App\Models;

use App\Models\Admin\Payout;
use App\Models\Admin\UserDetail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'added_by',
        'name',
        'email',
        'phone ',
        'gender',
        'state',
        'city',
        'pincode',
        'address',
        'avatar',
        'referrer_code',
        'referral_code',
        'kyc_status',
        'is_verified',
        'status',
        'is_old',
        'delete_status'
    ];

    protected $hidden = [
        'password',
        'is_verified',
        'delete_status'
    ];

    public function sponsorDetail(){
        return $this->belongsTo(User::class,'referral_code','referrer_code')->where('delete_status','0');
    }

    public function userDetail()
    {
        return $this->belongsTo(UserDetail::class,'id','user_id');
    }

    public function bankDetail(){
        return $this->belongsTo(BankDetail::class,'id','user_id');
    }

    public function commission(){
        return $this->hasMany(Commission::class,'user_id','id')->where('delete_status','0');
    }

    public function payout(){
        return $this->hasMany(Payout::class,'user_id','id');
    }

    public function associates(){
        return $this->hasMany(User::class,'referral_code','referrer_code')->where('delete_status','0');
    }

}
