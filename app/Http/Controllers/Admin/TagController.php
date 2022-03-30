<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index ()
    {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags'));
    }

    // public function create ()
    // {
    //     return view('admin.tag.create');
    // }

    public function store (Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
        ]);
        Tag::firstOrCreate($data);
        return redirect()->route('admin.tag');
    }

    public function show (Tag $tag)
    {
        return view('admin.tag.show', compact('tag'));
    }

    public function edit (Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update (Request $request, Tag $tag)
    {
        $data = $request->validate([
            'title' => 'required|string',
        ]);
        $tag->update($data);
        return view('admin.tag.show', compact('tag'));
    }

    public function delete (Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tag');
    }
}
