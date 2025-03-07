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

    // Customers Routes
    Route::get('customers', [CustomersController::class, 'index']);
    Route::get('customers/create', [CustomersController::class, 'create']);
    Route::post('customers', [CustomersController::class, 'store']);
    Route::get('customers/{customer}/edit', [CustomersController::class, 'edit']);
    Route::put('customers/{customer}', [CustomersController::class, 'update']);
    Route::delete('customers/{customer}', [CustomersController::class, 'destroy']);

    // Invoices Routes
    Route::get('invoices', [InvoicesController::class, 'index']);
    Route::post('invoices', [InvoicesController::class, 'store']);
    Route::put('invoices/{invoice}', [InvoicesController::class, 'update']);
    Route::delete('invoices/{invoice}', [InvoicesController::class, 'destroy']);

    // Materials Routes
    Route::get('materials', [MaterialsController::class, 'index']);
    Route::post('materials', [MaterialsController::class, 'store']);
    Route::put('materials/{material}', [MaterialsController::class, 'update']);
    Route::delete('materials/{material}', [MaterialsController::class, 'destroy']);

    // Suppliers Routes
    Route::get('suppliers', [SuppliersController::class, 'index']);
    Route::post('suppliers', [SuppliersController::class, 'store']);
    Route::put('suppliers/{supplier}', [SuppliersController::class, 'update']);
    Route::delete('suppliers/{supplier}', [SuppliersController::class, 'destroy']);

    // Users Routes
    Route::get('users', [UserController::class, 'index']);
    Route::post('users', [UserController::class, 'store']);
    Route::put('users/{user}', [UserController::class, 'update']);
    Route::delete('users/{user}', [UserController::class, 'destroy']);

    // Products Routes
    Route::get('products', [ProductsController::class, 'index']);
    Route::post('products', [ProductsController::class, 'store']);
    Route::put('products/{product}', [ProductsController::class, 'update']);
    Route::delete('products/{product}', [ProductsController::class, 'destroy']);

    // Reports Routes
    Route::get('reports', [ReportsController::class, 'index']);
    Route::post('reports', [ReportsController::class, 'store']);
    Route::put('reports/{report}', [ReportsController::class, 'update']);
    Route::delete('reports/{report}', [ReportsController::class, 'destroy']);

    // Staff Routes
    Route::get('staff', [StaffController::class, 'index']);
    Route::post('staff', [StaffController::class, 'store']);
    Route::put('staff/{staff}', [StaffController::class, 'update']);
    Route::delete('staff/{staff}', [StaffController::class, 'destroy']);
});
