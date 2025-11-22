<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'index'])
->name('login.index');

Route::post('/login', [LoginController::class, 'authenticate'])
->name('login.authenticate');

Route::post('/logout', [LoginController::class, 'logout'])
->name('login.logout');