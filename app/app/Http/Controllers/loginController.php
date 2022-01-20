<?php

namespace App\Http\Controllers;

use App\Models\handleSession;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

//use Laravel\Socialite\Facades\Socialite;

class loginController
{
    //Loginpage
    public static function page(){
        if(Session::get('token') != null){
            return redirect('/');
        }

        return view('login', ['error' => Session::get('login-error')]);
    }
    public static function login(){
        if(Session::get('token') != null){
            return redirect('/');
        }
        //Getting login data
        $email = Request::post('email');
        $password = Request::post('password');
        $emailExploded = explode('@', $email);

        //if email is not allowed stop here!
        if($emailExploded[1] != 'kfvelev.se'){
            Session::put('login-error', 'Email not Allowed, use @kfvelev.se instead');
            return redirect('/login');
        }
        //tries to login!
        $user = User::login($email)[0];
        if(!$user){
            //Did not find an account with that email!
            Session::put('login-error', 'Email is not Registered');
            return redirect('/login');
        }else if(Hash::check($password, $user->password)){
            //user has logged in
            //put session info!
            Session::flush(); //remove previous errors!
            Session::put('token', $user->token);
            Session::put('name', $user->name);
            Session::put('avatar', $user->avatar_url);
            Session::put('email', $user->email_pk);
            return redirect('/');
        }else{
            //wrong password!
            Session::put('login-error', 'Incorrect password!');
            return redirect('/login');
        }
    }

    public function registerPage(){
        return view('register', ['error' => Session::get('register-error')]);
    }

    public function register(){
        if(Session::get('token') != null){
            return redirect('/');
        }
        //Getting register data
        $user = [
            'email_pk' => Request::post('email'),
            'password' => Hash::make( Request::post('password')),
            'name' => Request::post('name'),
            'token' => bin2hex(random_bytes(30))
        ];

        $emailExploded = explode('@', $user['email_pk']);

        //Checks if email is allowed, Atm only kfvelev.se allowed
        if($emailExploded[1] != 'kfvelev.se'){
            Session::put('register-error', 'Email not Allowed, use @kfvelev.se instead');
            return redirect('/register');
        }

        $checkEmail = User::checkEmailExists($user['email_pk']);
        //checks if email is already registered
        //if return to register page with error
        if($checkEmail){
            Session::put('register-error', 'Email Already Registered');
            return back();
        }


        // Sends user data to /model/user
        $success = User::register($user);
        // if successfully  registered an account return to login-page
        //else return to register page with error
        if($success){
            Session::remove('login-error');
            Session::remove('register-error');
            return redirect('/login');
        }else{
            Session::put('register-error', 'There where an error creating your account');
            return back();
        }
    }
}
