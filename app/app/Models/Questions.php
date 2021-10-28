<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Questions
{
    public static function get($course_pk){
        return DB::select("select * from questions, users WHERE email_pk = user_fk and course_fk = '{$course_pk}' ORDER BY create_at DESC LIMIT 0,20");
    }
    public static function get_one($id){
        return DB::select("select * from questions, users  WHERE email_pk = user_fk and q_pk = '{$id}'");
    }
    public static function get_your($id){
        return DB::select("select * from questions, users  WHERE email_pk = user_fk and user_fk = '{$id}'");
    }
    public static function upload($data){
        return DB::insert("INSERT INTO `questions` (`user_fk`, `title`, `q_text`, `course_fk`) VALUES ('{$data->user_fk}', '{$data->title}', '{$data->q_text}', '{$data->course}')");
    }    
}
