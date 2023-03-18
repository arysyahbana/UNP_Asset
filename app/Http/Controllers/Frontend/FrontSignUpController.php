<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class FrontSignUpController extends Controller
{
    public function signup()
    {
        return view('frontend.signup.front_signup');
    }

    public function store(Request $request)
    {
        $store = new User();
        $token = hash('sha256', time());
        $store->token = $token;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $store->name = $request->name;
        $store->email = $request->email;
        $store->password = Hash::make($request->password);

        $verif_link = url('signup/verification/' . $token . '/' . $request->email);
        $subject = 'verifikasi email';
        $message = 'klik link <a href="' . $verif_link . '">ini</a> untuk mengaktifkan akun anda';
        Mail::to($request->email)->send(new Websitemail($subject, $message));

        $store->save();
        return redirect()->route('user_signup')->with('success', 'check email anda');
    }

    public function verif($token, $email)
    {
        $verif = User::where('token', $token)->where('email', $email)->first();
        $verif->token = NULL;
        $verif->update();
        return redirect()->route('home')->with('success', 'verifikasi berhasil');
    }
}
