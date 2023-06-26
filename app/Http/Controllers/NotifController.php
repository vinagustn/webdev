<?php

namespace App\Http\Controllers;

use App\Models\Marriage;
use App\Models\Notif;
use Illuminate\Http\Request;

class NotifController extends Controller
{



    public function reminder()
    {
        $data = Marriage::where('status', 'proses')->get();
        // dd(date('Y-m-d'));
        foreach ($data as $key => $tgl) {
            # code...
            if ($tgl->tgl_proses == date('Y-m-d')) {
                # code...
                Notif::create([
                    'id_kawin' => $tgl->id,
                    'message' => 'ada notif baru nih',
                    'read' => 'show'
                ]);
            }
        }

        dd('sampel reminder proses notif');
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
