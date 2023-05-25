<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like($post_id)
    {
        $like = Like::where('post_id', $post_id)->where('user_id', auth()->user()->id)->first();

        if ($like) {
            $like->delete();
            return back();
        } else {
            Like::create([
                'post_id' => $post_id,
                'user_id' => auth()->user()->id
            ]);
            return back();
        }
    }
}
