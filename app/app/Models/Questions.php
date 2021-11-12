<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Questions
{
    public static function get($course_pk){
        return DB::select("select * from posts, users WHERE email_pk = user_fk and post_fk = -1 and course_fk = '{$course_pk}'ORDER BY created_at DESC LIMIT 0,20");
    }
    public static function get_one($id){
        return DB::select("select * from posts, users  WHERE email_pk = user_fk and posts_pk = '{$id}' and posts_fk = -1");
    }
    public static function get_your($id){
        return DB::select("select * from posts, users  WHERE email_pk = user_fk and user_fk = '{$id}'");
    }
    public static function upload($data){
        return DB::insert("INSERT INTO `posts` (`post_rubrik`,`post_text`,`course_fk`, `user_fk`) VALUES ('{$data->title}', '{$data->q_text}','{$data->course}', '{$data->user_fk}')");
    }    
    public static function get_answers($parent_id){
        //return DB::select("SELECT * FROM posts where`post_fk` = {$parent_id}");
        return DB::select("Select * from posts, users WHERE email_pk = user_fk and (post_fk = {$parent_id} or post_pk = {$parent_id})");
    }
}