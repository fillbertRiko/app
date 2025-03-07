<?php

namespace App\Http\Controllers\Admin;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    public function index()
    {
        $users = Staff::all();
        return view('admin.users.index', compact('users'));
    }

}
