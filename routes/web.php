<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;

// Trang chủ chuyển hướng đến dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Route cho khu vực đăng ký (register) của Admin
Route::get('/register', [AuthController::class, 'showRegister'])->name('admin.auth.register');
Route::post('/register', [AuthController::class, 'register']);

// Route cho đăng nhập của Admin
Route::prefix('admin/auth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.auth.login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Route cho đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->name('admin.auth.logout');

// Ví dụ route dashboard của Admin (được bảo vệ middleware auth)
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth');

//route cho user
Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/users/edit', [UserController::class, 'edit'])->name('admin.users.edit');