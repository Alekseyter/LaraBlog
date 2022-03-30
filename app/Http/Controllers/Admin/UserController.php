<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index ()
    {
        $users = User::all();
        $roles = User::getRoles();
        return view('admin.user.index', compact('users', 'roles'));
    }

    // public function create ()
    // {
    //     return view('admin.user.create');
    // }

    public function store (StoreRequest $request)
    {
        $data = $request->validate($request->rules());
        $data['password'] = Hash::make($data['password']);
        User::firstOrCreate(['email' => $data['email']], $data);

        return redirect()->route('admin.user');
    }

    public function show (User $user)
    {
        $roles = User::getRoles();
        return view('admin.user.show', compact('user', 'roles'));
    }

    public function edit (User $user)
    {
        $roles = User::getRoles();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update (UpdateRequest $request, User $user)
    {
        $data = $request->validate($request->rules());

        $user->update($data);

        return view('admin.user.show', compact('user'));
    }

    public function delete (User $user)
    {
        $user->delete();
        return redirect()->route('admin.user');
    }
}
