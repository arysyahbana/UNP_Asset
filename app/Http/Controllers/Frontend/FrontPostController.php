<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontPostController extends Controller
{
    public function show($id, $name)
    {
        // $user = User::where('name', $name)->get('id');
        $data = Post::where('user_id', $id)->get();
        // $data = User::with('rPost')->where('name', $name);
        return view('frontend.Post.front-post_show', compact('data'));
    }

    public function create($id, $name)
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
            $request->file('file')->move(storage_path('app/public/uploads/photo/'), $final);
            $store->file = $final;
        }
        if ($ext == 'mp4' || $ext == 'mkv' || $ext == 'webm') {
            $ext = $request->file('file')->extension();
            $final = 'video' . time() . '.' . $ext;
            $request->file('file')->move(storage_path('app/public/uploads/video/'), $final);
            $store->file = $final;
        }
        if ($ext == 'mp3' || $ext == 'm4a') {
            $ext = $request->file('file')->extension();
            $final = 'audio' . time() . '.' . $ext;
            $request->file('file')->move(storage_path('app/public/uploads/audio/'), $final);
            $store->file = $final;
        }
        $store->user_id = Auth::guard()->user()->id;
        $store->name = $request->title;
        $store->body = $request->body;
        $store->category_id = $request->category_menu;
        $store->save();
        return redirect()->back()->with('success', 'Upload Success');
    }

    public function delete($id)
    {
        $delete = Post::where('id', $id)->first();

        if (file_exists(storage_path('app/public/uploads/photo/' . $delete->file))) {
            unlink(storage_path('app/public/uploads/photo/' . $delete->file));
        } elseif (file_exists(storage_path('app/public/uploads/video/' . $delete->file))) {
            unlink(storage_path('app/public/uploads/video/' . $delete->file));
        } elseif (file_exists(storage_path('app/public/uploads/audio/' . $delete->file))) {
            unlink(storage_path('app/public/uploads/audio/' . $delete->file));
        }
        $delete->delete();
        return redirect()->back()->with('success', 'berhasil di hapus');
    }

    public function view($id, $name)
    {
        $view = Post::where('id', $id)->where('name', $name)->first();
        return view('detail', compact('view'));
    }


    public function edit($id)
    {
        $edit = Post::where('id', $id)->first();
        return view('frontend.Post.front_post_edit', compact('edit'));
    }
    public function update(Request $request, $id)
    {
        $update = Post::where('id', $id)->first();
        $user = User::where('id', $update->user_id)->first();
        $update->name = $request->title;
        $update->body = $request->body;
        $update->update();
        return redirect()->route('post_show', [$update->user_id, $user->name])->with('success', 'berhasil di edit');
    }
}
