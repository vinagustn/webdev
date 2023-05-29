<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //login page
    public function index()
    {
        return view('login.index');
    }

    //login post
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:6',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt($credentials)){
            $request -> session() -> regenerate();
            return redirect()->intended('users');
        }

        return back()->with('loginError', 'Login failed!!');
    }

    //logout
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
