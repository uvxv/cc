<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\PenaltyController;
use App\Http\Controllers\Api\v1\ApplicationController;
use App\Http\Controllers\Api\v1\LicenseApplicationController;
use App\Http\Controllers\Api\v1\LicenseController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\AdminController;
use App\Http\Controllers\Api\v1\ApiUserController;

Route::prefix('v1')
->group(function () {
    // All routes here expect authanticated admin vai sanctum
    Route::middleware('auth:sanctum')->group(function () {
        // Applications
        Route::get('/applications', [ApplicationController::class, 'index']);
        Route::post('/applications', [ApplicationController::class, 'store']);
        Route::get('/applications/{id}', [ApplicationController::class, 'show']);
        Route::put('/applications/{id}', [ApplicationController::class, 'update']);
        Route::delete('/applications/{id}', [ApplicationController::class, 'destroy']);
        Route::post('/applications/{id}/approve', [ApplicationController::class, 'approve']);
        Route::post('/applications/{id}/reject', [ApplicationController::class, 'reject']);

        // License Applications
        Route::get('/license-applications', [LicenseApplicationController::class, 'index']);
        Route::post('/license-applications', [LicenseApplicationController::class, 'store']);
        Route::get('/license-applications/{id}', [LicenseApplicationController::class, 'show']);
        Route::put('/license-applications/{id}', [LicenseApplicationController::class, 'update']);
        Route::delete('/license-applications/{id}', [LicenseApplicationController::class, 'destroy']);
        Route::post('/license-applications/{id}/approve', [LicenseApplicationController::class, 'approve']);
        Route::post('/license-applications/{id}/reject', [LicenseApplicationController::class, 'reject']);

        // Licenses
        Route::get('/licenses', [LicenseController::class, 'index']);
        Route::post('/licenses', [LicenseController::class, 'store']);
        Route::get('/licenses/{id}', [LicenseController::class, 'show']);
        Route::put('/licenses/{id}', [LicenseController::class, 'update']);
        Route::delete('/licenses/{id}', [LicenseController::class, 'destroy']);
        Route::post('/licenses/{id}/approve', [LicenseController::class, 'approve']);
        Route::post('/licenses/{id}/reject', [LicenseController::class, 'reject']);

        // Users
        Route::apiResource('users', UserController::class)->except(['create', 'edit']);

        // Admins & api users
        Route::apiResource('admins', AdminController::class)->except(['create', 'edit']);
        Route::get('admins/manage', [AdminController::class, 'manageAdmins']);
        Route::apiResource('api-users', ApiUserController::class)->except(['create', 'edit']);

        // Penalties
        Route::apiResource('penalties', PenaltyController::class)->except(['create', 'edit']);
    });
});
