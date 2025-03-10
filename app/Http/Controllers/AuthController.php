<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validation
        $fields = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed']
        ]);

        // Register
        $user = User::create([
            'name'     => $fields['name'],
            'email'    => $fields['email'],
            'password' => bcrypt($fields['password']),  //ma hoa bang bycrypt
        ]);

        // Login
        Auth::login($user);

        // Redirect to dashboard
        return redirect()->route('dashboard');
    }

    public function login(Request $request)
    {
        // Validate input data
        $credentials = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);

        // Attempt to login with validated credentials
        if (Auth::attempt($credentials)) {
            // Regenerate session to enhance security
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        // Return error if login fails and retain input data
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.'
        ])->withInput();
    }

    public function logout(Request $request)
    {
        //logout user
        Auth::logout();

        //invalidate user's request
        $request->session()->invalidate();

        //regenarate csrf token
        $request->session()->regenerateToken();

        //redirect to home
        return redirect('/');
    }
}
