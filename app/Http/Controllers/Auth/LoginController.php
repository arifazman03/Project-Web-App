<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');  // Your login form (login.blade.php)
    }

    // Handle the login request
    public function login(Request $request)
    {
        // Validate the input data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in with the provided credentials
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect to the intended page or homepage after successful login
            return redirect()->route('home');  // Directly redirect to the home route
        }

        // If authentication fails, return with error message
        return back()->withErrors(['email' => 'These credentials do not match our records.']);
    }
}

