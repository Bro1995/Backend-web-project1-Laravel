<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Public profile page (visible for everyone)
    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }

    // Edit own profile (logged-in user)
    public function edit(Request $request)
    {
        $user = $request->user();

        return view('profile.edit', compact('user'));
    }

    // Update own profile
    public function update(Request $request)
    {
        $user = $request->user();

        // Validation (includes default Laravel profile fields + extra fields)
        $data = $request->validate([
            'name'            => ['required', 'string', 'max:255'],
            'email'           => ['required', 'string', 'email', 'max:255'],
            'username'        => ['nullable', 'string', 'max:255'],
            'birthday'        => ['nullable', 'date'],
            'about'           => ['nullable', 'string'],
            'profile_picture' => ['nullable', 'image', 'max:2048'],
        ]);

        // Save profile picture if uploaded
        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')
                ->store('profile_pictures', 'public');
        }

        // Reset email verification if email was changed
        if (isset($data['email']) && $data['email'] !== $user->email) {
            $data['email_verified_at'] = null;
        }

        // Update user with validated data
        $user->update($data);

        return redirect('/profile')->with('status', 'Profile updated.');
    }

    // Delete own account
    public function destroy(Request $request)
    {
        // Validate password before deleting account
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Logout user before deleting account
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Delete user account
        $user->delete();

        return redirect('/');
    }
}
