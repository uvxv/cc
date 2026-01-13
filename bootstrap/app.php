<?php


use Illuminate\Foundation\Application;
use App\Http\Middleware\PreventReSubmission;
use App\Http\Middleware\CheckLicenseResubmission;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        
        $middleware->alias([
            'form_checksubmission' => PreventReSubmission::class,
            'license_resubmission' => CheckLicenseResubmission::class,
        ]);

        $middleware->redirectGuestsTo(function (Request $request) {
            return match (true){
                $request->is('token*') => route('token.login'),
                default => route('login'),
            };
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
