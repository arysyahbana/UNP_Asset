<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontProfileController extends Controller
{
    public function edit($id)
    {
        $edit = User::where('id', $id)->first();
        return view('frontend.profile.profile_show', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'hp' => 'required'
        ]);

        $update = User::where('id', $id)->first();
        $update->name = $request->name;
        $update->email = $request->email;
        $update->hp = $request->hp;

        if ($request->password != '') {
            $request->validate([
                'password' => 'required|confirmed'
            ]);
            $update->password = Hash::make($request->new_password);
        }
        $update->update();
        return redirect()->back()->with('success', 'profile berhasil diubah');
    }
}
