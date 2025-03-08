<?php

namespace App\Http\Controllers\Admin;

use App\Models\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User_accounts;
use Illuminate\Foundation\Auth\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

}
