<?php

namespace App\Http\Controllers\Jemaat;

use App\Http\Controllers\Controller;
use App\Models\Jemaat;
use App\Models\Menikah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranMenikahController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $data = Jemaat::where('user_id', $user->id)->first();

        return view('pages.jemaat.pendaftaran-menikah.create', compact('data'));
    }

    public function store(Request $request)
    {
        $menikah = new Menikah();
        $menikah->jemaat_id = $request->jemaat_id;
        $menikah->nama_pasangan = $request->nama_pasangan;
        $menikah->jenis_kelamin_pasangan = $request->jenis_kelamin_pasangan;
        $menikah->tempat_lahir_pasangan = $request->tempat_lahir_pasangan;
        $menikah->tanggal_lahir_pasangan = $request->tanggal_lahir_pasangan;
        $menikah->nama_ayah_pasangan = $request->nama_ayah_pasangan;
        $menikah->nama_ibu_pasangan = $request->nama_ibu_pasangan;
        if ($request->hasFile('surat_baptis_pasangan')) {
            $file = $request->file('surat_baptis_pasangan');
            $filename = 'Surat Baptis' . '_' . $request->nama_pasangan . '_' . date('d F Y') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('berkas-pendaftaran-menikah'), $filename);
            $menikah->surat_baptis_pasangan = $filename;
        }
        if ($request->hasFile('surat_sidi_pasangan')) {
            $file = $request->file('surat_sidi_pasangan');
            $filename = 'Surat Sidi' . '_' . $request->nama_pasangan . '_' . date('d F Y') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('berkas-pendaftaran-menikah'), $filename);
            $menikah->surat_sidi_pasangan = $filename;
        }
        $menikah->tanggal_pernikahan = $request->tanggal_pernikahan;
        $menikah->status_menikah = 'Mendaftar';
        $menikah->save();

        return redirect('/pendaftaran-menikah');
    }

    public function cekStatusMenikah(Request $request)
    {
        $jemaat_id = $request->jemaat_id;

        $menikah = Menikah::where('jemaat_id', $jemaat_id)->first();
        
        if ($menikah && $menikah->status_menikah == 'Sudah Menikah') {
            return response()->json(['status' => 'Sudah Menikah']);
        } elseif ($menikah && $menikah->status_menikah == 'Mendaftar') {
            return response()->json(['status' => 'Mendaftar']);
        } elseif ($menikah && $menikah->status_menikah == 'Dikonfirmasi') {
            return response()->json(['status' => 'Dikonfirmasi']);
        } else {
            return response()->json(['status' => 'Belum Menikah']);
        }
    }
}
