<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontProfileController extends Controller
{
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('frontend.profile.profile_show', compact('user'));
    }
}
