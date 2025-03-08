<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_Accounts;

class UserController extends Controller
{
    // Display a listing of the users
    public function index()
    {
        $users = User_Accounts::all();
        return view('admin.users.index', compact('users'));
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('admin.users.edit');
    }

    // Store a newly created user in storage
    public function store(Request $request)
    {
        $request->validate([
            'UsernameAcc' => 'required|string|max:100|unique:user_accounts',
            'PasswordAcc' => 'required|string|min:8|confirmed',
        ]);

        User_Accounts::create([
            'UsernameAcc' => $request->UsernameAcc,
            'PasswordAcc' => bcrypt($request->PasswordAcc),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    // Display the specified user
    public function show($id)
    {
        $user = User_Accounts::findOrFail($id);
        return view('admin.users.index', compact('user'));
    }

    // Show the form for editing the specified user
    public function edit($id)
    {
        $user = User_Accounts::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Update the specified user in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'UsernameAcc' => 'required|string|max:100|unique:user_accounts,UsernameAcc,' . $id . ',AccountID',
            'PasswordAcc' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User_Accounts::findOrFail($id);
        $user->update([
            'UsernameAcc' => $request->UsernameAcc,
            'PasswordAcc' => $request->PasswordAcc ? bcrypt($request->PasswordAcc) : $user->PasswordAcc,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    // Remove the specified user from storage
    public function destroy($id)
    {
        $user = User_Accounts::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
