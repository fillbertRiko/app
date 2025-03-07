<?php

declare(strict_types=1);

use Illuminate\Http\Request;
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
use App\Models\Customers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Đây là nơi bạn đăng ký các route API cho ứng dụng.
| Các route này được load bởi RouteServiceProvider và sẽ được gán
| vào nhóm middleware "api". Mặc định Laravel thêm tiền tố "/api".
|
*/

// Route mặc định của Sanctum để lấy thông tin người dùng
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Nhóm route admin với tiền tố "admin" và middleware auth:sanctum
Route::group(['prefix' => 'admin', 'middleware' => 'auth:sanctum'], function () {

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index']);

    // Authentication (Login & Register)
    Route::get('login', [LoginController::class, 'index']);
    Route::post('login', [LoginController::class, 'store']);
    Route::get('register', [RegisterController::class, 'index']);
    Route::post('register', [RegisterController::class, 'store']);

    // Resource Routes
    //customers
    Route::get('/customers', [CustomersController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CustomersController::class, 'create'])->name('customers.create');
    Route::get('/customers/{customer}/edit', [CustomersController::class, 'edit'])->name('customers.edit');

    //` invoices
    Route::apiResource('invoices', InvoicesController::class);
    Route::apiResource('materials', MaterialsController::class);
    Route::apiResource('suppliers', SuppliersController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('products', ProductsController::class);
    Route::apiResource('reports', ReportsController::class);
    Route::apiResource('staff', StaffController::class);
});
