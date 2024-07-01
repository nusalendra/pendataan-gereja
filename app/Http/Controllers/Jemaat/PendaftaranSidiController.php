<?php

namespace App\Http\Controllers\Jemaat;

use App\Http\Controllers\Controller;
use App\Models\Baptis;
use App\Models\Jemaat;
use App\Models\Sidi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranSidiController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $data = Jemaat::where('user_id', $user->id)->first();

        return view('pages.jemaat.pendaftaran-sidi.create', compact('data'));
    }

    public function store(Request $request)
    {
        $jemaat = Jemaat::find($request->jemaat_id);
        $sidi = new Sidi();
        $sidi->jemaat_id = $request->jemaat_id;
        $sidi->tanggal_sidi = $request->tanggal_sidi;
        if ($request->hasFile('surat_baptis')) {
            $file = $request->file('surat_baptis');
            $filename = 'Surat Baptis' . '_' . $jemaat->nama_lengkap  . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('surat-baptis-pendaftaran-sidi'), $filename);
            $sidi->surat_baptis = $filename;
        }
        $sidi->status_sidi = 'Mendaftar';
        $sidi->save();

        return redirect('/pendaftaran-sidi');
    }

    public function cekStatusSidi(Request $request)
    {
        $jemaat_id = $request->jemaat_id;

        $sidi = Sidi::where('jemaat_id', $jemaat_id)->first();
        $baptis = Baptis::where('jemaat_id', $jemaat_id)->first();

        if (!$baptis || $baptis->tanggal_baptis == null) {
            return response()->json(['status' => 'Belum Baptis']);
        } elseif ($sidi && $sidi->status_sidi == 'Sudah Sidi') {
            return response()->json(['status' => 'Sudah Sidi']);
        } elseif ($sidi && $sidi->status_sidi == 'Mendaftar') {
            return response()->json(['status' => 'Mendaftar']);
        } elseif ($sidi && $sidi->status_sidi == 'Dikonfirmasi') {
            return response()->json(['status' => 'Dikonfirmasi']);
        } else {
            return response()->json(['status' => 'Belum Sidi']);
        }
    }
}
