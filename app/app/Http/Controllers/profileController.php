<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class profileController extends Controller
{
    public function index($id)
    {
        if(Session::get('email') !== $id) return redirect('/');

        return view('profile');
    }
}
