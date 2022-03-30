<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    public function index ()
    {
        $data = [];
        $data['likesCount'] = auth()->user()->likedPosts->count();
        $data['commentsCount'] = auth()->user()->comments->count();
        
        return view('personal.main.index', compact('data'));
    }
}
