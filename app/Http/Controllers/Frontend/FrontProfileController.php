<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontProfileController extends Controller
{
    public function profile($name)
    {
        $show = User::where('name', $name)->first();

        if ($show) {
            // Jika user ditemukan, ambil semua post yang dimilikinya
            $post = Post::where('user_id', $show->id)->latest()->get();
            return view('frontend.profile.profile_show', compact('post', 'show'));
        } else {
            // Handle jika user tidak ditemukan
            echo "gagal";
        }
        // $show = User::where('name', $name)->first();
        // $post = Post::where('name', $name)->latest()->get();
        // return view('frontend.profile.profile_show', compact('show', 'post'));
    }
    public function edit($name)
    {
        $edit = User::where('name', $name)->first();
        return view('frontend.profile.profile_edit', compact('edit'));
    }

    public function update(Request $request, $name)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'hp' => 'required',
            'status' => 'required',
            'foto_profil' => 'mimes:png,jpg,jpeg',
        ]);

        $update = User::where('name', $name)->first();

        if ($update) {
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
                $file = $request->file('foto_profil');
                $ext = $file->getClientOriginalExtension();

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
            }

            if (!empty($request->password)) {
                $request->validate([
                    'password' => 'required|confirmed',
                ]);
                $update->password = Hash::make($request->password);
            }

            $update->save();
            return redirect()->route('profile', [$update->name])->with('success', 'Profil berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Profil tidak ditemukan');
        }
    }
}
