<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Baptis;
use App\Models\Sidi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class PendataanSidiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sidi::all();
        return view('pages.admin.pendataan-sidi.index', compact('data'));
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
        //
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
        $sidi = Sidi::find($id);

        if ($request->input('action_type') == 'konfirmasi_sidi') {
            $sidi->status_sidi = 'Dikonfirmasi';
        } elseif ($request->input('action_type') == 'sudah_sidi') {
            $sidi->status_sidi = 'Sudah Sidi';
        }

        $sidi->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function unduhSuratBaptis($id)
    {
        $sidi = Sidi::find($id);

        if ($sidi->surat_baptis) {
            $filePath = public_path('/surat-baptis-pendaftaran-sidi' . '/' . $sidi->surat_baptis);

            if (File::exists($filePath)) {
                return Response::download($filePath);
            }
        }
    }
}
