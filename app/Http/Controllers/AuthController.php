<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('adminpage.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('dashboard');
        }

        // Authentication failed
        return redirect()->back()->withErrors(['loginError' => 'Invalid username or password.']);
    }

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // public function updatePassword(Request $request)
    // {
    //     $request->validate([
    //         'password' => 'required|confirmed|min:8',
    //     ]);

    //     // Debug: Check if user is authenticated
    //     if (Auth::check()) {
    //         // User is logged in
    //         $user = Auth::user();
    //     } else {
    //         // User not authenticated
    //         return response()->json(['error' => 'User not authenticated'], 401);
    //     }

    //     $user->password = Hash::make($request->password);
    //     $user->save();

    //     return response()->json(['message' => 'Password updated successfully.']);
    // }
}
