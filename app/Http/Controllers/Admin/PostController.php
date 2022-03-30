<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends BaseController
{
    public function index ()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create ()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.post.create', compact('categories', 'tags'));
    }

    public function store (StoreRequest $request)
    {
        $data = $request->validate($request->rules());

        $this->service->store($data);

        return redirect()->route('admin.post');
    }

    public function show (Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    public function edit (Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    public function update (UpdateRequest $request, Post $post)
    {
        $data = $request->validate($request->rules());

        $post = $this->service->update($data, $post);

        return redirect()->back();
    }

    public function delete (Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post');
    }
}
