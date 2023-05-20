<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //viewed
    public function index()
    {
        return view('layouts.register', [
            'tittle' => 'employees'
        ]);
    }

    //registration
    public function store()
    {
        
    }
}
