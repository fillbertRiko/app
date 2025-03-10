<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Trang chủ chuyển hướng đến dashboard
Route::view('/', 'admin.dashboard')->name('dashboard');
Route::middleware('auth')->group(function() {
    //Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function() { 
    //Register
    Route::view('/register', 'admin.auth.register')->name('register');
    Route::post('/register', [AuthController::class,'register']);
    
    //Login
    Route::view('/login', 'admin.auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

