<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    //viewing page
    public function create()
    {
        return view('layouts.input', [
            'tittle' => 'Input Data'
        ]);
    }
}
