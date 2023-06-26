<?php

namespace App\Http\Controllers;

use App\Enum\EStatus;
use App\Models\Marriage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class MarriageController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:karyawan,superadmin');
    }

    //landing page
    public function index()
    {
        $status = EStatus::cases();
        return view('layouts.inputKawin', [
            'tittle' => 'Input Data',
            'statuses' => $status
        ]);
    }

    //store data
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_kawin' => 'required',
            'id_jantan' => 'required|exists:breedings,id',
            'id_betina' => 'required|exists:breedings,id',
            'status' => [new Enum(EStatus::class)]
        ]);

        Marriage::create($validatedData);
        
        return redirect('/perkawinan/input')->with('success', 'Data perkawinan berhasil dibuat!');
    }

    public function show()
    {
        $marriages = Marriage::sortable([
            'id', 'tgl_kawin', 'id_jantan', 'id_betina', 'status'
        ])->search(request(['search']))->latest()->paginate(25);
        return view('layouts.viewKawin', [
            'tittle' => 'view Data',
            'marriages' => $marriages
        ]);
    }

    public function edit($id)
    {
        $status = EStatus::cases();
        $marriages = Marriage::find($id);
        return view('editLayouts.editKawin', [
            'tittle' => 'view Data',
            'marriage' => $marriages,
            'statuses' => $status
        ]);
    }

    public function update(Request $request, $id)
    {
        $married = Marriage::find($id);
        $married->update([
            'tgl_kawin' => $request->tgl_kawin,
            'id_jantan' => $request->id_jantan,
            'id_betina' => $request->id_betina,
            'status' => $request->status,
        ]);

        return redirect('/perkawinan/list')->with('success', 'Data berhasil diubah!!');
    }

    public function destroy($id)
    {
        Marriage::where('id', $id)->delete();
        return redirect('/perkawinan/list')->with('success', 'Data berhasil dihapus!');
    }

    //for notif
    public function showNotif() 
    {
        $marriage = Marriage::all();
        $marriage->tgl_kawin->addDays(25);
        if($marriage->status == "Hamil"){
            $marriage->tgl_kawin->addDays(150);
        }
        $notifications = marriage()->unreadNotifications;

        return view('layouts.notif', [
            'tittle' => 'Notification',

        ]);
    }
}
