<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontHomeController extends Controller
{
    public function index()
    {
        $post = Post::with('rUser')->get();
        return view('frontend.home', compact('post'));
    }
    public function photo()
    {
        $post = Post::get();
        return view('frontend.home', compact('post'));
    }
    public function video()
    {
        $post = Post::get();
        return view('frontend.home', compact('post'));
    }
    public function audio()
    {
        $post = Post::get();
        return view('frontend.home', compact('post'));
    }
    public function detail($id, $nama)
    {
        $post = Post::with('rUser')->where('id', $id)->first();
        return view('frontend.detailhome', compact('post'));
    }

    public function download($file)
    {
        $path_photo = storage_path('app/public/uploads/photo/' . $file);
        $extphoto = pathinfo($path_photo, PATHINFO_EXTENSION);
        if ($extphoto == 'jpg' || $extphoto == 'png' || $extphoto == 'jpeg') {
            $path = storage_path('app/public/uploads/photo/' . $file);
            return response()->download($path);
        }

        $path_video = storage_path('app/public/uploads/video/' . $file);
        $extvideo = pathinfo($path_video, PATHINFO_EXTENSION);
        if ($extvideo == 'mp4' || $extvideo == 'mkv' || $extvideo == 'webm') {
            $path = storage_path('app/public/uploads/video/' . $file);
            return response()->download($path);
        }

        $path_audio = storage_path('app/public/uploads/audio/' . $file);
        $extaudio = pathinfo($path_audio, PATHINFO_EXTENSION);
        if ($extaudio == 'mp3' || $extaudio == 'm4a') {
            $path = storage_path('app/public/uploads/audio/' . $file);
            return response()->download($path);
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $post = Post::where('name', 'like', '%' . $search . '%')->get();
        return view('frontend.home', compact('post'));
    }

    public function search_photo(Request $request)
    {
        $search = $request->search_photo;
        $pattern = 'photo';
        $post = Post::where('name', 'like', '%' . $search . '%')->Where('file', 'like', '%' . $pattern . '%')->get();
        return view('frontend.home', compact('post'));
        // return redirect()->route('photo')->with(compact('post'));
    }

    public function search_video(Request $request)
    {
        $search = $request->search_video;
        $pattern = 'video';
        $post = Post::where('name', 'like', '%' . $search . '%')->Where('file', 'like', '%' . $pattern . '%')->get();
        return view('frontend.home', compact('post'));
    }

    public function search_audio(Request $request)
    {
        $search = $request->search_audio;
        $pattern = 'audio';
        $post = Post::where('name', 'like', '%' . $search . '%')->Where('file', 'like', '%' . $pattern . '%')->get();
        return view('frontend.home', compact('post'));
    }
}
