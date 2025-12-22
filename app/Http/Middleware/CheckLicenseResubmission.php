<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLicenseResubmission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $uerId = auth()->id();
        $existingApplication = \App\Models\LicenseApplication::where('user_id', $uerId)->first();
        if ($existingApplication) {
            return redirect()->back()->withErrors(['formerror' => 'You have already submitted a license application.']);
        }
        return $next($request);
    }
}
