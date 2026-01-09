<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show all users in the admin panel
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Show form to create a new user
    public function create()
    {
        return view('admin.users.create');
    }

    // Store a new user created by an admin
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'username' => 'nullable|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'is_admin' => 'boolean',
        ]);

        // Hash the password before saving
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('admin.users.index');
    }

    // Update admin status (simple toggle)
    public function update(Request $request, User $user)
    {
        $user->update([
            'is_admin' => $request->boolean('is_admin')
        ]);

        return back();
    }

    // Update user role (admin or user)
    public function updateRole(Request $request, User $user)
    {
        $user->role = $request->boolean('is_admin') ? 'admin' : 'user';
        $user->save();

        return back();
    }
}
