<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username'              => ['required', 'string', 'max:255', 'unique:users'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'              => ['required', 'confirmed', Password::defaults()],
            'bio'                   => ['nullable', 'string'],
        ]);

        $user = User::create([
            'username' => $validatedData['username'],
            'email'    => $validatedData['email'],
            'password' => $validatedData['password'], // Automatically hashed via the mutator in User model
            'bio'      => $validatedData['bio'] ?? null,
            // If you have an image upload, you'll need additional handling here
        ]);

        return redirect()->route('login')
                    ->with('success', 'Registration successful! Please log in.');
    }
}
