<?php

namespace App\Http\Controllers;

use App\Enum\EGender;
use App\Models\Breeding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class BreedingController extends Controller
{
    //viewed
    public function index()
    {
        $genders = EGender::cases();
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
            'tinggi' => 'required|regex:/^[0-9]+(\.[0-9]{1,2})?$/',
            'panjang_bdn' => 'required|regex:/^[0-9]+(\.[0-9]{1,2})?$/',
            'lingkar' => 'required|regex:/^[0-9]+(\.[0-9]{1,2})?$/',
            'pj_telinga' => 'required|regex:/^[0-9]+(\.[0-9]{1,2})?$/'
        ]);

        Breeding::create($validated);

        return redirect('/breeding/input')->with('success', 'Input breeding create successfully!');
    }

    //viewed all data
    public function show()
    {
        $breedings = Breeding::sortable([
            'id', 'gender', 'umur', 'tinggi', 'panjang_bdn', 'lingkar', 'pj_telinga'
        ])->search(request(['search']))->paginate(25);
        
        return view('layouts.viewBreeding', [
            'breedings' => $breedings,
            'tittle' => 'View data'
        ]);
    }

    public function edit($id)
    {
        $genders = EGender::cases();
        $put = Breeding::find($id);
        return view('editLayouts.editBreedings', [
            'genders' => $genders,
            'put' => $put,
            'tittle' => 'View data'
        ]);
    }

    public function update(Request $request, $id)
    {
        $breed = Breeding::find($id);
        $breed->gender = $request->gender;
        $breed->umur = $request->umur;
        $breed->panjang_bdn = $request->panjang_bdn;
        $breed->tinggi = $request->tinggi;
        $breed->lingkar = $request->lingkar;
        $breed->pj_telinga = $request->pj_telinga;
        $breed->save();

        return redirect('/breeding/list')->with('success', 'Data berhasil diubah!');
    }

    //delete data
    public function destroy($id)
    {
        Breeding::where('id', $id)->delete();
        return redirect('/breeding/list')->with('success', 'Data berhasil dihapus!');
    }
}
