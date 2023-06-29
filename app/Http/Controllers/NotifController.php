<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Notif;
use App\Models\Marriage;
use Illuminate\Http\Request;

class NotifController extends Controller
{



    public function reminder()
    {
        $data = Marriage::where('status', 'proses')->get();
        // $data->tgl_proses = Carbon::create($data->tgl_kawin)->addDays(25);
        // $data->save;
        // dd(date('Y-m-d'));
        foreach ($data as $key => $proses) {
            # code...
            if ($proses->tgl_proses == date('Y-m-d')) {
                # code...
                Notif::create([
                    'id_kawin' => $proses->id,
                    'message' => 'Sudah 25 hari dari tanggal perkawinan, coba cek apakah kambing Hamil atau Tidak!',
                    'read' => 'show'
                ]);
            }
        }

        $data = Notif::where('read', 'show')->get();
        return view('layouts.notif', [
            'tittle' => 'Notifikasi',
            'data' => $data
        ]);

        // $newData = Marriage::where('status', 'hamil')->get();
        // foreach ($newData as $key => $pregnant)
        // {
        //     if ($pregnant->tgl_hamil == date('Y-m-d'))
        //     {
        //         Notif::create([
        //             'id_kawin' => $pregnant->id,
        //             'message' => 'Sudah 150 hari nih dari, coba cek kambing betinanya!',
        //             'read' => 'show'
        //         ]);
        //     }
        // }
        // dd('sampel reminder proses notif');
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
