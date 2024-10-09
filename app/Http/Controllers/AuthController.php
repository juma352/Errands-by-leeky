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
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        dd($validatedData);

        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        dd($user);
        
        


        // Log the user in
        auth()->login($user);

        // Redirect the user to the dashboard
        return redirect()->route('errands.index')
        ->with('success', 'User created successfully');
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