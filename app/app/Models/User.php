<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class User
{
    public static function login($email){
        $user = DB::table('users')
        ->where('email_pk', '=', $email)
        ->get();

        return $user;
    }
    public static function register($user){

        $success = DB::table('users')
        ->insert($user);
        return $success;
    }

    public static function checkEmailExists($email){
        $user = DB::table('users')
        ->where('email_pk', '=', $email)
        ->value('email_pk');
        return $user;
    }
}
