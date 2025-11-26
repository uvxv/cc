<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'authenticate')->name('login.authenticate');
    Route::post('/logout', 'logout')->name('login.logout');
});
<<<<<<< HEAD
<<<<<<< HEAD

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
=======
>>>>>>> b1374f8031468a2bcc639952d12412ca3ecc40c4
=======

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register.index');
    Route::post('/register', 'store')->name('register.store');
});
Route::view('/', 'home')->name('home');


>>>>>>> 770119e2cf017e5cdfb4cda89193a909f3bc1955
