<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        if($request->password !== $request->password_confirmation){
            return back()->withErrors(['password' => 'Password confirmation does not match.'])->withInput();
        }
        if(User::where('email', $request->email)->exists()){
            return redirect()->route('login.index')->withErrors(['login_message' => 'Email already exists.'])->withInput();
        }
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'nullable|string|max:500',
            'id_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = User::create([
            'first_name' => $validatedData['firstname'],
            'last_name' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'address' => $validatedData['address'] ?? null,
        ]);

        if ($request->hasFile('id_image')) {
            // store on default disk (uses FILESYSTEM_DISK from .env)
            $image = $request->file('id_image')->store('nic');
            $user->image = $image;
            $user->save();
        }
        return redirect()->route('login.index')->with('success', 'Registration successful!');
    }
}
