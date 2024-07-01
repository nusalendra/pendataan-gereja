<?php

namespace App\Http\Controllers\Jemaat;

use App\Http\Controllers\Controller;
use App\Models\Baptis;
use App\Models\Jemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranBaptisController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $data = Jemaat::where('user_id', $user->id)->first();

        return view('pages.jemaat.pendaftaran-baptis.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $baptis = new Baptis();
        $baptis->jemaat_id = $request->jemaat_id;
        $baptis->tanggal_baptis = $request->tanggal_baptis;
        $baptis->status_baptis = 'Mendaftar';
        $baptis->save();

        return redirect('/pendaftaran-baptis');
    }

    public function cekStatusBaptis(Request $request)
    {
        $jemaat_id = $request->jemaat_id;

        $baptis = Baptis::where('jemaat_id', $jemaat_id)->first();

        if ($baptis && $baptis->status_baptis == 'Sudah Baptis') {
            return response()->json(['status' => 'Sudah Baptis']);
        } elseif ($baptis && $baptis->status_baptis == 'Mendaftar') {
            return response()->json(['status' => 'Mendaftar']);
        } elseif ($baptis && $baptis->status_baptis == 'Dikonfirmasi') {
            return response()->json(['status' => 'Dikonfirmasi']);
        } else {
            return response()->json(['status' => 'Belum Baptis']);
        }
    }
}
