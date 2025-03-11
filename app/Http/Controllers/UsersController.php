<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(4);
        return view('admin.users.index', ['users' => $users]);
    }

    public function edit(User $user)
    {   
        //dd($user);
        return view('admin.users.edit', ['user'=>$user]);
    }

    public function destroy(User $user, Request $request)
    {
        if ($request->isMethod('post')) {
            $user->delete();
            return redirect()->route('users')->with('success', 'User deleted successfully');
        } else {
            $users = User::all();
            return view('admin.users.index', ['users' => $users]);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required|in:admin,staff',
            'password' => 'nullable|min:6'
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

}
