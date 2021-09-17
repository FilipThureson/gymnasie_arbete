<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class User
{
    public static function login($user){
        if(DB::select("select email_pk from users WHERE email_pk = '{$user->getEmail()}'" )){
            return false;
        }else{
            return DB::insert("INSERT INTO users (email_pk,name, avatar_url) VALUES ('{$user->getEmail()}','{$user->getName()}', '{$user->getAvatar()}')");
        }
    }
}
