<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Trang chủ chuyển hướng đến dashboard
Route::get('/', function()
{
    return view('admin.dashboard');
})->name('dashboard');


//Register
Route::get('/register',function()
{
    return view('admin.auth.register');
})->name('register');
Route::post('/register', [AuthController::class,'register']);

//Login
Route::get('/login',function()
{
    return view('admin.auth.login');
})->name('login');

//Logout
Route::get('/logout', function()
{
    return view('admin.dashboard');
})->name('logout');
