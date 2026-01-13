<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\PenaltyController;



Route::prefix('v1')
->group(function () {
    Route::get('/penalties', [PenaltyController::class, 'index']);
    Route::post('/penalties', [PenaltyController::class, 'store']);
    Route::get('/penalties/{id}', [PenaltyController::class, 'show']);
    Route::put('/penalties/{id}', [PenaltyController::class, 'update']);
    Route::delete('/penalties/{id}', [PenaltyController::class, 'destroy']);
});