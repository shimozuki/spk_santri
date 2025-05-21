<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserContoller extends Controller
{
    public function index()
    {
        $page = 'user';
        $users = User::where('role', '!=', 'User')->get();
        return view('pages.user.index', compact('page', 'users'));
    }

    public function create()
    {
        $page = 'user';
        return view('pages.user.create', compact('page'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'roles' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->roles
        ]);

        return Redirect::route('users.index')->with('success', 'User berhasil di tambah.');
    }

    public function edit(User $user)
    {
        $page = 'user';
        return view('pages.user.edit', compact('page', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'roles' => 'required'
        ]);

        $user->update([
            'name' => $request->name,
            'role' => $request->roles
        ]);

        return Redirect::route('users.index')->with('success', 'User berhasil di ubah.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return Redirect::route('users.index')->with('success', 'User berhasil di hapus.');
    }
}
