<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Post;

class LikeController extends Controller
{
    public function index ()
    {
        $posts = auth()->user()->likedPosts;
        return view('personal.like.index', compact('posts'));
    }

    public function delete (Post $post)
    {
        auth()->user()->likedPosts()->detach($post->id);
        return redirect()->route('personal.like');
    }
}
