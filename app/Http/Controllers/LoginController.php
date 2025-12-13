<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $user = null;
        $credentials = $request->validate([
            'nic' => "required|integer|max_digits:12",
            'password' => "required|string",
        ]);

        if (!User::where('nic', $credentials['nic'])->exists()) {
            return redirect()->route('register.index')->withErrors(['login_message' => 'NIC does not exist.'])->withInput();
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('userdashboard.index')->with('user', Auth::user());
        }

        return back()->withErrors([
            'failed' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {  
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}