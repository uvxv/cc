<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'authenticate')->name('login.authenticate');
    Route::post('/logout', 'logout')->name('login.logout');
});

Route::view('/', 'home')->name('home');