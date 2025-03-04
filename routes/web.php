<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffLoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SaleInvoiceController;
use App\Http\Controllers\ImportInvoiceController;
use App\Http\Controllers\SaleInvoiceDetailController;
use App\Http\Controllers\ImportInvoiceDetailController;

Route::view('/','posts.index')->name('home');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login',function()
{
    return view('auth.login');
})->name('login');

Route::resource('staff', StaffController::class);
Route::resource('staff-logins', StaffLoginController::class);
Route::resource('products', ProductController::class);
Route::resource('materials', MaterialController::class);
Route::resource('customers', CustomerController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('sale-invoices', SaleInvoiceController::class);
Route::resource('import-invoices', ImportInvoiceController::class);
Route::resource('sale-invoice-details', SaleInvoiceDetailController::class);
Route::resource('import-invoice-details', ImportInvoiceDetailController::class);