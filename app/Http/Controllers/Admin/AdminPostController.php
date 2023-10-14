<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function show()
    {
        $posts = Post::with('rCategory')->with('rUser')->get();
        // $data = Post::latest()->get();
        return view('admin.post.post_show', compact('posts'));
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect()->route('admin-post-show')->with('success', 'Delete Success');
    }
}
