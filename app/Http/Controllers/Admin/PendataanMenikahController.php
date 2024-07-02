<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menikah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class PendataanMenikahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Menikah::all();
        return view('pages.admin.pendataan-menikah.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Menikah::find($id);
        return view('pages.admin.pendataan-menikah.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menikah = Menikah::find($id);

        if ($request->input('action_type') == 'konfirmasi_menikah') {
            $menikah->status_menikah = 'Dikonfirmasi';
        } elseif ($request->input('action_type') == 'sudah_menikah') {
            $menikah->status_menikah = 'Sudah Menikah';
        }

        $menikah->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function unduhBerkasPendaftaranMenikah($id, Request $request)
    {
        $menikah = Menikah::find($id);

        if ($request->input('action_type') == 'surat_baptis_pasangan') {
            $filePath = public_path('/berkas-pendaftaran-menikah' . '/' . $menikah->surat_baptis_pasangan);

            if (File::exists($filePath)) {
                return Response::download($filePath);
            }
        } elseif($request->input('action_type') == 'surat_sidi_pasangan') {
            $filePath = public_path('/berkas-pendaftaran-menikah' . '/' . $menikah->surat_sidi_pasangan);

            if (File::exists($filePath)) {
                return Response::download($filePath);
            }
        }
    }
}
