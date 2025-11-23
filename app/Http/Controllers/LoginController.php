<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('nic', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'failed' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {  
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}