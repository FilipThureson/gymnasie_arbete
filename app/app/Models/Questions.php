<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Questions
{
    public static function get($course_pk){
        return DB::select("select * from posts, users WHERE email_pk = user_fk and post_fk = -1 and course_fk = '{$course_pk}'ORDER BY created_at DESC LIMIT 0,20");
    }
    public static function get_one($id){
        return DB::select("select * from posts, users  WHERE email_pk = user_fk and post_pk = '{$id}'");
    }
    public static function get_your($id){
        return DB::select("select * from posts, users  WHERE email_pk = user_fk and user_fk = '{$id}'");
    }
    public static function upload($data){
        return DB::insert("INSERT INTO `posts` (`post_rubrik`,`post_text`,`course_fk`, `user_fk`) VALUES ('{$data->title}', '{$data->q_text}','{$data->course}', '{$data->user_fk}')");
    }
    public static function delete($id){
        return DB::delete("delete from posts where post_pk = {$id}");
    }
    public static function upload_answers($data){
        return DB::insert("INSERT INTO `posts` (`post_rubrik`,`post_text`,`post_fk`,`course_fk`, `user_fk`) VALUES ('svar', '{$data->post_text}', '{$data->post_fk}','Response', '{$data->user_fk}')");
    }

    public static function get_answers($parent_id){
        
        return DB::select("select * from (select * from posts, users where email_pk=user_fk order by post_fk, post_pk) posts, (select @pv := '{$parent_id}') initialisation where find_in_set(post_pk, @pv) or find_in_set(post_fk, @pv) > 0 and @pv := concat(@pv, ',', post_pk)");

        //return DB::select("select * from posts, users WHERE email_pk = user_fk and (post_fk = {$parent_id} or post_pk = {$parent_id})");
    }

    public static function get_like($user_fk, $post_fk){
        return DB::select("select * from posts_likes where user_fk = '{$user_fk}' and post_fk = {$post_fk}");
    }

    public static function like($id){
        $user_fk = Session::get('email');
        DB::update("update posts set upvotes = upvotes + 1 where post_pk = $id");
        DB::insert("INSERT INTO `posts_likes` (`like_pk`, `user_fk`, `post_fk`) VALUES (NULL, '{$user_fk}', '{$id}')");
        return DB::select("select upvotes from posts WHERE post_pk = '{$id}'");
    }
}