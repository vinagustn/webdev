<?php

namespace App\Http\Controllers;

use App\Enum\EGender;
use App\Models\Birth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Facades\Validator;

class BirthController extends Controller
{
    //get page
    public function create(){
        $genders = EGender::cases();
        return view('layouts.inputLahir', [
            'tittle' => 'input data',
            'genders' => $genders
        ]);
    }

    //store data
    public function store(Request $request)
    {
        $validator = [Validator::make($request->all(), [
            'id_kawin' => 'required|exists:marriages,id',
            'tgl_lahir' => 'required',
            'id_anak' => 'array',
            'id_anak.*' => 'integer',
            'gender_anak' => 'array',
            'gender_Anak.*' => [new Enum(EGender::class), 'string']
        ])];

        // for ($i=0; $i < collect($request->id_anak)->count(); $i++) { 
        //     $validator->id_anak[$i] = $request->id_anak[$i];
        //     $validator->gender_anak[$i] = $request->gender_anak[$i];
        // }

        Birth::create($validator);

        return redirect('/kelahiran/input')->with('success', 'Data kelahiran berhasil diinputkan!');
    }
}
