<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function home()
    {
        return view('challenge.home');
    }
    
}
