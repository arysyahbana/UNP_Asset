<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontPostController extends Controller
{
    public function show()
    {
        $data = Post::get();
        return view('frontend.Post.front-post_show', compact('data'));
    }

    public function create()
    {
        $category = Category::get();
        return view('frontend.Post.front_post_create', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:png,jpg,jpeg,mp4,mkv,webm,mp3,m4a,',
            'body' => 'required',

        ], [
            'body.required' => 'deskripsi harus diisikan',
            'file.required' => 'harus ada file yang dimasukan',
            'file.mimes' => 'file harus berupa gambar, video, audio',
            'title.required' => 'title tidak boleh kosong'
        ]);
        $store = new Post();
        $files = $request->file('file');
        $ext = $files->getClientOriginalExtension();
        if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
            $ext = $request->file('file')->extension();
            $final = 'photo' . time() . '.' . $ext;
            $request->file('file')->move(public_path('uploads/photo/'), $final);
            $store->file = $final;
        }
        if ($ext == 'mp4' || $ext == 'mkv' || $ext == 'webm') {
            $ext = $request->file('file')->extension();
            $final = 'video' . time() . '.' . $ext;
            $request->file('file')->move(public_path('uploads/video/'), $final);
            $store->file = $final;
        }
        if ($ext == 'mp3' || $ext == 'm4a') {
            $ext = $request->file('file')->extension();
            $final = 'audio' . time() . '.' . $ext;
            $request->file('file')->move(public_path('uploads/audio/'), $final);
            $store->file = $final;
        }
        $store->user_id = 1;
        $store->name = $request->title;
        $store->body = $request->body;
        $store->category_id = $request->category_menu;
        $store->save();
        return redirect()->back()->with('success', 'Upload Success');
    }
}
