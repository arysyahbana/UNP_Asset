<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontLoginControler extends Controller
{
    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
            // echo 'suce';
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }
    public function logout()
    {
        Auth::guard()->logout();
        return redirect()->route('home')->with('succeess', 'Telah logout');
    }
}
