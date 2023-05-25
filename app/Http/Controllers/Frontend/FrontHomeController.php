<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FrontHomeController extends Controller
{
    public function index(Request $request)
    {
        // $post = Post::with('rUser')->get();
        $search = $request->input('search');
        $post = Post::where('name', 'like', '%' . $search . '%')->latest()->with('rUser')->get();
        $reso = Post::query()->distinct()->select('resolution')->get();
        return view('frontend.home', compact('post', 'reso'));
    }
    public function photo(Request $request)
    {
        $search = $request->input('search_photo');
        $pattern = 'photo';
        $reso = Post::query()->distinct()->select('resolution')->get();
        $post = Post::where('name', 'like', '%' . $search . '%')->Where('file', 'like', '%' . $pattern . '%')->latest()->with('rUser')->get();
        // $post2 = Post::latest()->with('rUser')->get();
        return view('frontend.home', compact('post', 'reso'));
    }

    public function reso(Request $request, $ukuran)
    {
        $search = $request->input('search_photo');
        $pattern = 'photo';
        // $post = Post::where('name', 'like', '%' . $search . '%')->Where('file', 'like', '%' . $pattern . '%')->latest()->with('rUser')->get();
        $post = Post::where('resolution', $ukuran)->where('name', 'like', '%' . $search . '%')->Where('file', 'like', '%' . $pattern . '%')->latest()->with('rUser')->get();
        $reso = Post::query()->distinct()->select('resolution')->get();
        return view('frontend.home', compact('post', 'reso'));
    }

    public function video(Request $request)
    {
        $search = $request->input('search_video');
        $pattern = 'video';
        $post = Post::where('name', 'like', '%' . $search . '%')->Where('file', 'like', '%' . $pattern . '%')->latest()->get();
        $reso = Post::query()->distinct()->select('resolution')->get();
        return view('frontend.home', compact('post', 'reso'));
    }
    public function audio(Request $request)
    {
        $search = $request->input('search_audio');
        $pattern = 'audio';
        $post = Post::where('name', 'like', '%' . $search . '%')->Where('file', 'like', '%' . $pattern . '%')->latest()->get();
        $reso = Post::query()->distinct()->select('resolution')->get();
        return view('frontend.home', compact('post', 'reso'));
    }
    public function detail($id, $nama)
    {
        $post = Post::where('id', $id)->first();
        $post2 = Post::latest()->with('rUser')->get();
        $like = Like::where('post_id', $post->id)->count();
        $url = url('detail/' . $post->id . '/' . $post->rUser->name);
        $message = 'File from <a href="' . $url . '">' . $post->rUser->name . '</a> by UNP Asset';
        return view('frontend.detailhome', compact('post', 'post2', 'like', 'url', 'message'));
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

        $path_raw_photo = storage_path('app/public/uploads/rawphoto/' . $file);
        $extrawphoto = pathinfo($path_raw_photo, PATHINFO_EXTENSION);
        if ($extrawphoto == 'eps' || $extrawphoto == 'psd' || $extrawphoto == 'ai' || $extrawphoto == 'cdr') {
            $path = storage_path('app/public/uploads/rawphoto/' . $file);
            return response()->download($path);
        }

        $path_raw_video = storage_path('app/public/uploads/rawvideo/' . $file);
        $extrawvideo = pathinfo($path_raw_video, PATHINFO_EXTENSION);
        if ($extrawvideo == 'aep' || $extrawvideo == 'aepx' || $extrawvideo == 'prproj') {
            $path = storage_path('app/public/uploads/rawvideo/' . $file);
            return response()->download($path);
        }
    }

    public function linkUser($id)
    {
        $post = Post::with('rUser')->where('id', $id)->first();
        $like = Like::where('post_id', $post->id)->count();
        $url = url('detail/' . $post->id . '/' . $post->rUser->name);
        $message = 'klik link <a href="' . $url . '">ini</a>';
        return view('frontend.detailhome', compact('url', 'post', 'like', 'message'));
        // dd($url);
        // die;
        // $message = 'klik link <a href="' . $reset_link . '">ini</a>';
    }
}
