<?php

namespace App\CPU;

use App\Models\Admin\Topic;
use Illuminate\Support\Str;

class TopicManager
{

    public static function withoutTrash()
    {
        return Topic::where('delete_status','0');
    }

}
