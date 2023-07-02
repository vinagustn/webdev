<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Notif;
use App\Models\Marriage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotifController extends Controller
{



    public function reminder()
    {
        $skrg = Carbon::now();
        $data = Marriage::where('status', 'Proses')->get();
        foreach ($data as $key => $proses) {
            $tgl_kwn = Carbon::parse($proses->tgl_kawin);
            # code...
            if (($tgl_kwn->diffInDays($skrg)) == 25) {
                # code...
                Notif::create([
                    'id_kawin' => $proses->id,
                    'message' => 'Sudah 25 hari dari tanggal perkawinan, coba cek apakah kambing Hamil atau Tidak!',
                    'read' => 'show'
                ]);
            }
        }

        $newData = Marriage::where('status', 'Hamil')->get();
        foreach ($newData as $key => $pregnant)
        {
            $tgl_kawinn = Carbon::parse($pregnant->tgl_kawin);
            if (($tgl_kawinn->diffInDays($skrg)) == 150)
            {
                Notif::create([
                    'id_kawin' => $pregnant->id,
                    'message' => 'Sudah 150 hari nih dari, coba cek kambing betinanya!',
                    'read' => 'show'
                ]);
            }
        }

        $data = Notif::where('read', 'show')->get();
        return view('layouts.notif', [
            'tittle' => 'Notifikasi',
            'data' => $data
        ]);

        
    //     // dd('sampel reminder proses notif');
    }

    public function readMessage($id)
    {
        $data = Notif::findOrFail($id);
        $data->update([
            'read' => 'read'
        ]);
        
        return back();
    }
}
