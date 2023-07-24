<?php

namespace App\Http\Controllers;

use App\Enum\EGender;
use App\Models\Birth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Facades\Validator;

class BirthController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:karyawan,superadmin');
    }
    
    //get page
    public function create(){
        return view('layouts.inputLahir', [
            'tittle' => 'input data'
        ]);
    }

    //store data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kawin' => 'required|exists:marriages,id',
            'tgl_lahir' => 'required',
            'jml_anak' => 'required|integer',
            'jml_anak_mati' => 'required|integer',
            'id_anak' => 'required',
            'gender_anak' => 'required'
        ]);

        Birth::create($validated);

        return redirect('/kelahiran/input')->with('success', 'Data kelahiran berhasil diinputkan!');
    }

    public function show()
    {
        $births = Birth::with('perkawinan')->sortable([
            'id', 'id_kawin', 'tgl_lahir', 'jml_anak', 'tgl_kawin', 'id_betina', 'id_jantan', 'jml_anak_mati'
        ])->search(request(['search']))->paginate(25);

        return view('layouts.viewBirth', [
            'tittle' => 'view data',
            'births' => $births,

        ]);
    }
}
