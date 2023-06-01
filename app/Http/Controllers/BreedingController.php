<?php

namespace App\Http\Controllers;

use App\Enum\EGender;
use App\Models\Breeding;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class BreedingController extends Controller
{
    //viewed
    public function index()
    {
        $genders = EGender::values();
        return view('layouts.input', [
            'genders' => $genders,
            'tittle' => 'Input Data'
        ]);
    }

    //input data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'gender' => [new Enum(EGender::class)],
            'umur' => 'required',
            'tinggi' => 'required',
            'panjang_bdn' => 'required',
            'lingkar' => 'required',
            'pj_telinga' => 'required'
        ]);

        Breeding::create($validated);

        return redirect('/input')->with('success', 'Input breeding create successfully!');
    }
}
