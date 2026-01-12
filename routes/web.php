<?php

use App\Livewire\ApplyForm;
use App\Livewire\ApplyLicense;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserDashboardController;

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'authenticate')->name('login.authenticate');
    Route::post('/logout', 'logout')->name('login.logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register.index');
    Route::post('/register', 'store')->name('register.store');
});
Route::view('/', 'home')->name('home');

Route::get('/userdashboard', [UserDashboardController::class, 'index'])
-> middleware('auth')
->name('userdashboard.index');

Route::get('/apply', ApplyForm::class)
-> middleware(['auth', 'form_checksubmission'])
->name('apply.form');

Route::get('/add', ApplyLicense::class)
-> middleware(['auth', 'license_resubmission'])
->name('apply.license');

Route::get('/token', [ApiController::class, 'index'])
->name('token.index');

Route::get('/token/create', [ApiController::class, 'create'])
->name('token.create');

Route::post('/token/store', [ApiController::class, 'store'])
->name('token.store');

Route::get('/token/login', [ApiController::class, 'login'])
->name('token.login');

Route::post('/token/authenticate', [ApiController::class, 'authenticate'])
->name('token.authenticate');

Route::get('/whoami', function(){ return get_class(Auth::user() ?? auth()->guard('api')->user()); })->middleware('auth');