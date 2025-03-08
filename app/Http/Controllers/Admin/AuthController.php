<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User_Accounts;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Hien thi form dang ki
    public function showRegister()
    {
        return view('admin.auth.register');
    }

    //Xu ly dang ki
    public function register(Request $request)
    {
        //Validate du lieu dau vao
        $request->validate([
            'username' => ['required|string|max:255|unique:Username,UsernameAcc'],
            'password' => ['required|string|min:6|confirmed'],
        ]);

        //Tao tai khoan moi voi mat khu da duoc hash
        $user =  User_Accounts::create([
            'UsernameAcc' => $request->username,
            'PasswordAcc' => Hash::make($request->password),
        ]);

        //dang nhap tu dong sau khi dang ki thanh cong
        Auth::login($user);

        //chuyen huong ve trang dashboard
        return redirect()->route('dashboard')->with('success', 'Dang ki tai khoan thanh cong');
    }

    //Hien thi form dang nhap
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    //Xu ly dang nhap
    public function login(Request $request)
    {
        //xu ly du lieu dau vao
        $credentials = $request->validate([
            'username' => ['required|string|exists:UsernameAc,PasswordAcc'],
            'password' => ['required|string'],
        ]);

        //tim user dua tren UsernameAcc
        $user = User_Accounts::where('UsernameAcc', $credentials['username'])->first();

        //so sanh mat khau
        if($user && Hash::check($credentials['password'], $user->PasswordAcc)){
            //dang nhap thanh cong
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Dang nhap thanh cong');
        }

        //tra ve khi tai khoan hoac mat khau khong dung
        return back()->with('error', 'Tai khoan hoac mat khau khong dung');
    }

    //xu ly dang xuat
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Dang xuat thanh cong');
    }
}
