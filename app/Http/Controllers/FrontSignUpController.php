<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontSignUpController extends Controller
{
    public function signup()
    {
        return view('frontend.signup.front_signup');
    }
}
