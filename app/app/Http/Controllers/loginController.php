<?php

namespace App\Http\Controllers;

use App\Models\handleSession;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class loginController
{
    //Loginpage
    public static function page(){
        if(Session::get('google_token') != null){
            return redirect('/');
        }
        return view('login');
    }
    //handle session and db after login
    public static function login(){
        if(Session::get('google_token') != null){
            return redirect('/');
        }
        $user = Socialite::driver('google')->stateless()->user();
        $emailExploded = explode('@', $user->email);

        if($emailExploded[1] == 'kfvelev.se'){
            User::login($user);
            HandleSession::put_info($user);
            return redirect('/');
        }else{
            abort(403);
        }
    }

    //Rederict to socialite goolge oauth2
    public static function redirect(){
        if(Session::get('google_token') != null){
            return redirect('/');
        }
        return Socialite::driver('google')->with(['hd'=>'kfvelev.se'])->redirect();
    }
}
