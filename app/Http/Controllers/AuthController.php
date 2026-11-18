<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show register form.
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Show login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Get and validate form input.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:25',
            'email' => 'required|string|email|max:45|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login');
    }

    /**
     * Check login input.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){

            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back();
    }

    /**
     * Logout user.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
