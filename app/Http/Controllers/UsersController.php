<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    public function destroy(User $user, Request $request)
    {
        if ($request->isMethod('post')) {
            $user->delete();
            return redirect()->route('users')->with('success', 'User deleted successfully');
        }

        return view('admin.users.destroy', ['user' => $user]);
    }

    public function update(User $user)
    {
        return view('admin.users.update', ['user' => $user]);
    }
}
