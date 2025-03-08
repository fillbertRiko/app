<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::middleware('guest')->group(function () {
    
});

// Nhóm route admin với tiền tố "admin" và middleware auth:sanctum
Route::group(['prefix' => 'admin', 'middleware' => 'auth:sanctum'], function () {


});
