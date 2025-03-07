<?php

namespace App\Http\Controllers\Admin;

use App\Models\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        $users = Login::all();
        return view('admin.users.index', compact('users'));
    }

}
