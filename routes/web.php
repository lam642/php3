<?php

use Illuminate\Support\Facades\Route;
// dùng namespace của admin/productadmincontroller
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use PHPUnit\Framework\Attributes\Group;
// Điều hướng qua action của controller
Route::group([
    'prefix' => 'admin',  // Tiền tố URL: /admin
    'as' => 'admin.'      // Tiền tố tên route: admin.
], function () {
    Route::resource('categories', CategoryAdminController::class);
    Route::resource('products', ProductAdminController::class);
});

// câu lênh tạo controller: php artisan make:controller Tên_controller -r để tạo toàn bộ chức năng CRUD