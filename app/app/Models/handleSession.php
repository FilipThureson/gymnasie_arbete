<?php

namespace App\Models;

use Illuminate\Support\Facades\Session;

class handleSession
{
    public static function put_info($user){
        Session::put('google_token', $user->token);
        Session::put('name', $user->getName());
        Session::put('email', $user->getEmail());
        Session::put('avatar', $user->getAvatar());
    }
}
