<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class User
{
    public static function login($email){
        //returns user with the inputted email
        $user = DB::table('users')
        ->where('email_pk', '=', $email)
        ->get();
        return $user;
    }

    public static function getToken($email)
    {
        $token = DB::table('users')->where('email_pk', '=', $email)->value('token');
        return $token;
    }

    public static function register($user){
        //write new user to database
        $success = DB::table('users')
        ->insert($user);
        return $success;
    }

    public static function checkEmailExists($email){
        //if email exists return user
        $user = DB::table('users')
        ->where('email_pk', '=', $email)
        ->value('email_pk');
        return $user;
    }
    public static function newToken($email){
        //changes token on a user
        $user = DB::table('users')
        ->where('email_pk', '=' , $email)
        ->update(['token' => bin2hex(random_bytes(30))]);
        return $user;
    }
    public static function confirmEmail($token)
    {
        $user = DB::table('users')
        ->where('token', '=' , $token) //Finds user with the token sent in email!
        ->update(['token' => bin2hex(random_bytes(30)), 'email_verified' => true]); //Changes token and changes email_veritfied to true!
        return $user;
    }
    public static function resetPassword($token, $password)
    {
        $user = DB::table('users')
        ->where('token', '=' , $token) //Finds user with the token sent in email!
        ->update(['token' => bin2hex(random_bytes(30)), 'password' => $password]); //Changes token and changes email_veritfied to true!
        return $user;
    }
}
