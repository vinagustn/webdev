<?php

namespace App\Http\Controllers;

use App\Enum\EUserStatus;
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
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'    
        ]);

        if(Auth::attempt($credentials)){
            if(Auth::user()->role == 'superadmin'){
                if(Auth::user()->status == 'Active'){
                    $request -> session() -> regenerate();
                    return redirect()->intended('/dashboard');
                }
                
            }else if(Auth::user()->role == 'karyawan'){
                $request -> session() -> regenerate();
                return redirect()->intended('/breeding/input');
            }


            // $request -> session() -> regenerate();
            // return redirect()->intended('/breeding/input');
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
