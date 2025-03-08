<?php

namespace App\Http\Controllers\Admin;

use App\Models\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User_accounts;
use Illuminate\Foundation\Auth\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.auth.register');
    }

}
