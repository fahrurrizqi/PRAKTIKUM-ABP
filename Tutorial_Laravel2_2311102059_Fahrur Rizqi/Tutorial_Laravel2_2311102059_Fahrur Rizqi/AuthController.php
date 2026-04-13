<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/home');
        }

        return back()->with('error', 'Email / password salah');
    }

    public function registration()
    {
        return view('registration');
    }

    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Registrasi berhasil');
    }

    public function home()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        return view('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}