<?php

namespace App\Http\Controllers;

use App\Models\Health;
use Illuminate\Http\Request;

class HealthController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:karyawan,superadmin');
    }

    public function create(){
        return view('layouts.inputSehat', [
            'tittle' => 'input data'
        ]);
    }

    //store data
    public function store(Request $request){
        $validated = $request->validate([
            'id_ternak' => 'required|exists:breedings,id',
            'diseas_hst' => 'required',
            'treat_hst' => 'required' 
        ]);

        Health::create($validated);
        return redirect('/kesehatan/input')->with('success', 'Data kesehatan berhasil diinputkan!');
    }

    //viewed data
    public function show(){
        $healths = Health::sortable([
            'id_ternak'
        ])->search(request(['search']))->latest()->paginate(25);

        return view('layouts.viewHealth', [
            'tittle' => 'view data',
            'healths' => $healths
        ]);
    }

    //create view edit
    public function edit($id)
    {
        $healths = Health::find($id);
        return view('editLayouts.editSehat', [
            'tittle' => 'view data',
            'healths' => $healths
        ]);
    }

    //update data
    // public function update(Request $request, $id)
    // {
    //     $healths = Health::find($id);
    //     $healths->update([

    //     ]);
    // }

    //delete data
    public function destroy($id) {
        Health::where('id', $id)->delete();
        return redirect('/kesehatan/list')->with('success', 'Data berhasil dihapus');
    }
}
