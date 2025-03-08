<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // Gọi đúng lớp Controller

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
