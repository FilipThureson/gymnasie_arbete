<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Questions
{
    public static function get($course_pk){
        return DB::select("select * from questions WHERE course_fk = '{$course_pk}' ORDER BY create_at DESC LIMIT 0,20");
    }
    public static function get_one($course, $id){
        return DB::select("select * from questions WHERE q_pk = '{$id}' AND course_fk LIKE '{$course}'");
    }
}
