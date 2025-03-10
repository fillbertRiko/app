<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controllers
{
    public function register(Request $request)
    {
        //Validation
        $fields = $request->validate([
            'name' => ['required','max:255'],
            'email' => ['required','max:255','email','unique:users'],
            'password' => ['required','min:3','confirmed']
        ]);

        //Register
        $user = User::create($fields);

        //Login
        Auth::login($user);

        //Redirects
        return redirect()->route('dashboard');
    }
}
