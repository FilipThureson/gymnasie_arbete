<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class homeController extends Controller
{
    public static function home()
    {
        if(Session::get('google_token') == null){
            return redirect('/login');
        }

        return view("home",  ['courses' => Course::get_all()]);
    }
}
