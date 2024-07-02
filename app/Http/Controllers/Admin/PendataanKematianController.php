<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jemaat;
use App\Models\Kematian;
use Illuminate\Http\Request;

class PendataanKematianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jemaat::all();
        return view('pages.admin.pendataan-kematian.index', compact('data'));
    }

    public function ubahStatusKematian(Request $request) {
        $validated = $request->validate([
            'tanggalKematian' => 'required|date',
            'lokasiPemakaman' => 'required|string|max:255',
        ]);

        $kematian = new Kematian();
        $kematian->jemaat_id = $request->id;
        $kematian->tanggal_kematian = $validated['tanggalKematian'];
        $kematian->lokasi_pemakaman = $validated['lokasiPemakaman'];
        $kematian->save();

        $jemaat = Jemaat::find($request->id);
        $jemaat->status_jemaat = 'Meninggal';
        $jemaat->save();

        return response()->json(['success' => true]);
    }
}
