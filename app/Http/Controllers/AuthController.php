<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function create(Request $request)
    {


        return view('auth.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Create the user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
    
        // Log the user in
        Auth::login($user);
        // Add a success message
    session()->flash('success', 'Registration successful! Welcome to our application.');
    
        // Redirect to a desired location
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
    
        if (auth()->attempt($credentials)) {
            return redirect()->route('errands.index');
        }
    
        return view('auth.login', ['error' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}