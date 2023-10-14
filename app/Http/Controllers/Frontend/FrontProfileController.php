<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontProfileController extends Controller
{
    public function profile($id)
    {
        $show = User::where('id', $id)->first();
        $post = Post::where('user_id', $id)->latest()->get();
        return view('frontend.profile.profile_show', compact('show', 'post'));
    }
    public function edit($id)
    {
        $edit = User::where('id', $id)->first();
        return view('frontend.profile.profile_edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'hp' => 'required',
            'status' => 'required',
            'file' => 'mimes:png,jpg,jpeg'
        ]);

        $update = User::where('id', $id)->first();
        $update->name = $request->name;
        $update->nim = $request->nim;
        $update->email = $request->email;
        $update->hp = $request->hp;
        $update->about = $request->about;
        $update->instagram = $request->instagram;
        $update->twitter = $request->twitter;
        $update->status = $request->status;
        $update->place = $request->place;
        $update->contract = $request->contract;

        if ($request->hasFile('foto_profil')) {
            $files = $request->file('foto_profil');
            $ext = $files->getClientOriginalExtension();

            // Photo
            if (storage_path('app/public/uploads/photo/profil/' . $update->file == '')) {
                if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
                    $ext = $request->file('foto_profil')->extension();
                    $final = 'photo' . time() . '.' . $ext;

                    // menyimpan gambar asli
                    $request->file('foto_profil')->move(storage_path('app/public/uploads/photo/profil/'), $final);
                    $update->foto_profil = $final;
                }
            } elseif (storage_path('app/public/uploads/photo/profil/' . $update->file)) {
                unlink(storage_path('app/public/uploads/photo/profil/' . $update->file));
                if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
                    $ext = $request->file('foto_profil')->extension();
                    $final = 'photo' . time() . '.' . $ext;

                    // menyimpan gambar asli
                    $request->file('foto_profil')->move(storage_path('app/public/uploads/photo/profil'), $final);
                    $update->foto_profil = $final;
                }
            }
            // end Photo

            if ($request->password != '') {
                $request->validate([
                    'password' => 'required|confirmed'
                ]);
                $update->password = Hash::make($request->new_password);
            }
            $update->update();
            return redirect()->route('profile', [$update->id])->with('success', 'profile berhasil diubah');
        }
    }
}
