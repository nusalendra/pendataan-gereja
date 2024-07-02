<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jemaat;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jemaat::all();
        return view('pages.admin.laporan.index', compact('data'));
    }

    public function cetakPDF() {
        $data = Jemaat::all();
        $pdf = Pdf::loadView('pages.admin.laporan.cetak-pdf', ['data' => $data])
                   ->setPaper('a4', 'landscape');
        return $pdf->stream('laporan-peminjaman-barang.pdf');
    }
}
