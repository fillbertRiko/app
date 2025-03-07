<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\InvoicesController;
use App\Http\Controllers\Admin\MaterialsController;
use App\Http\Controllers\Admin\SuppliersController; 
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ReportsController;

// Trang chủ chuyển hướng đến dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Nhóm route cho khu vực admin
Route::prefix('admin')->name('admin.')->group(function () {

    //thu muc dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //thu muc staff
    Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');

    //thu muc user
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    //thu muc auth
    Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
    Route::get('/register', [RegisterController::class, 'index'])->name('auth.register');

    //thu muc customers
    Route::get('/customers', [CustomersController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CustomersController::class, 'create'])->name('customers.create');
    Route::get('/customers/{customer}/edit', [CustomersController::class, 'edit'])->name('customers.edit');

    //thu muc invoices
    Route::get('/invoices', [InvoicesController::class, 'index'])->name('invoices.sale');

    //thu muc materials
    Route::get('/materials', [MaterialsController::class, 'index'])->name('materials.index');

    //thu muc suppliers
    Route::get('/suppliers', [SuppliersController::class, 'index'])->name('suppliers.index');

    //thu muc products
    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    Route::resource('products', ProductsController::class);

    //thu muc reports
    Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
});

