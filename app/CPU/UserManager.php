<?php

namespace App\CPU;

use App\Models\User;
use Illuminate\Support\Str;

class UserManager
{

    public static function withoutTrash(){
        return User::where('delete_status','0');
    }

    public static function oldUserWithoutTrash(){
        return User::where('delete_status','0')->where('is_old','1');
    }

}
