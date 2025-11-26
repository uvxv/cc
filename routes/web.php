<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin authentication routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.post');
    Route::get('register', [App\Http\Controllers\Admin\AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [App\Http\Controllers\Admin\AuthController::class, 'register'])->name('register.post');
    Route::post('logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\Admin\AuthController::class, 'dashboard'])->name('dashboard');
        
        Route::get('tests', [App\Http\Controllers\Admin\TestController::class, 'index'])->name('tests.index');
        Route::get('tests/create', [App\Http\Controllers\Admin\TestController::class, 'create'])->name('tests.create');
        Route::post('tests', [App\Http\Controllers\Admin\TestController::class, 'store'])->name('tests.store');
        Route::get('tests/{test}/edit', [App\Http\Controllers\Admin\TestController::class, 'edit'])->name('tests.edit');
        Route::put('tests/{test}', [App\Http\Controllers\Admin\TestController::class, 'update'])->name('tests.update');
    });
});
