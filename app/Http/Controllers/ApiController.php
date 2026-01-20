<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function index()
    {   
        
        $tokens = Auth::guard('web_api')->user()->tokens;
        return view('api.api-list', ['tokens' => $tokens]);
    }

    public function login()
    {
        return view('api.api-login');
    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'access_id' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('web_api')->attempt([
            'access_id' => $validated['access_id'],
            'password' => $validated['password'],
        ])) {
            $request->session()->regenerate();
            return redirect()->route('token.index');
        } 

        return back()->withErrors(['access_id' => 'The provided credentials do not match our records.']);
    }
    
    public function create()
    {
        return view('api.api-create');
    }

    public function store()
    {
        
        $validated = request()->validate([
            'token_name' => ['required', 'string', 'max:255'],
            'abilities' => ['required', 'array', 'min:1'],
        ]);

        
        $user = Auth::guard('web_api')->user();
        $validAbilities = ['read:user', 'read:payments', 'read:application'];
        $abilities = array_intersect($validated['abilities'], $validAbilities);

        $token = $user->createToken($validated['token_name'], $abilities);

        return redirect()
            ->route('token.index')
            ->with('token', $token->plainTextToken);
        
    }

    public function revoke($id)
    {
        $user = Auth::guard('web_api')->user();
        $token = $user->tokens()->where('id', $id)->first();

        if ($token) {
            $token->delete();
        }

        return redirect()->route('token.index');
    }

    public function logout(Request $request)
    {
        Auth::guard('web_api')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('token.login');
    }
}