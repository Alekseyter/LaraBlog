<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index ()
    {
        $comments = auth()->user()->comments;
        return view('personal.comment.index', compact('comments'));
    }

    public function edit (Comment $comment)
    {
        return view('personal.comment.edit', compact('comment'));
    }

    public function update (Request $request, Comment $comment)
    {
        $data = $request->validate([
            'message' => 'required|string',
        ]);
        $comment->update($data);
        return redirect()->route('personal.comment');
    }

    public function delete (Comment $comment)
    {
        $comment->delete();
        return redirect()->route('personal.comment');
    }
}
