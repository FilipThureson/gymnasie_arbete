<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class courseController extends Controller
{
    public static function firstPage($course){
        return "<h1>Returning View For {$course}</h1>";
    }

    public static function oneQuestion($course, $id){
        return"<h1>Returning View For Question: {$id} in Course: {$course}</h1>";
    }
}
