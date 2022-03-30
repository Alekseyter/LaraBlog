<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index ()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    // public function create ()
    // {
    //     return view('admin.category.create');
    // }

    public function store (Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
        ]);
        Category::firstOrCreate($data);
        return redirect()->route('admin.category');
    }

    public function show (Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit (Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update (Request $request, Category $category)
    {
        $data = $request->validate([
            'title' => 'required|string',
        ]);
        $category->update($data);
        return view('admin.category.show', compact('category'));
    }

    public function delete (Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category');
    }
}
