<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavBarController extends Controller
{
    //
    public function home()
    {
        return view('home');
    }
    public function about()
    {
        return view('about_me');
    }
    public function contact()
    {
        return view('contact');
    }
    public function post()
    {
        return view('post');
    }
}

