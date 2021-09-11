<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public static function home()
    {
        return "<h1>homepage</h1>";
    }
}
