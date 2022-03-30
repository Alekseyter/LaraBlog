<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index ()
    {

        $posts = Post::orderBy('created_at', 'DESC')->paginate(8);

        $likedPosts = Post::orderBy('liked_users_count', 'DESC')->get()->take(3);

        $categories = Category::all();

        return view('main.index', compact('posts', 'likedPosts', 'categories'));
    }

    public function show (Post $post)
    {
        $date = Carbon::parse($post->created_at);
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->take(3);

        return view('main.show', compact('post', 'date', 'relatedPosts'));
    }

    public function store (Post $post, Request $request)
    {
        $data = $request->validate([
            'message' => 'required|string'
        ]);
        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $post->id;

        Comment::create($data);

        return redirect()->route('blog.show', $post->id);
    }

    public function storeLike (Post $post)
    {
        auth()->user()->likedPosts()->toggle($post->id);

        return redirect()->back();
    }

    public function showCategory (Category $category)
    {
        $posts = Post::where('category_id', '=', $category->id)->orderBy('created_at', 'DESC')->paginate(9);

        return view('main.category', compact('posts', 'category'));
    }
}
