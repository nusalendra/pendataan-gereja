<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Baptis;
use App\Models\Jemaat;
use App\Models\Menikah;
use App\Models\Sidi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class DataJemaatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jemaat::all();
        return view('pages.admin.data-jemaat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.data-jemaat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'username' => $request->username,
            'password' => ($request->password),
            'role' => 'Jemaat'
        ]);

        $jemaat = new Jemaat();
        $jemaat->user_id = $user->id;
        $jemaat->nama_lengkap = $request->nama_lengkap;
        $jemaat->jenis_kelamin = $request->jenis_kelamin;
        $jemaat->tanggal_lahir = $request->tanggal_lahir;
        $jemaat->NIK = $request->NIK;
        $jemaat->alamat = $request->alamat;
        $jemaat->golongan_darah = $request->golongan_darah;
        $jemaat->nama_ayah = $request->nama_ayah;
        $jemaat->nama_ibu = $request->nama_ibu;
        $jemaat->status_vaksin = $request->status_vaksin;
        if ($request->hasFile('surat_akte_lahir')) {
            $file = $request->file('surat_akte_lahir');
            $filename = 'Surat Akte Lahir' . '_' . $jemaat->nama_lengkap  . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('surat-akte-lahir'), $filename);
            $jemaat->surat_akte_lahir = $filename;
        }
        $jemaat->status_jemaat = 'Hidup';
        $jemaat->save();

        if ($request->filled('tanggal_pernikahan')) {
            $menikah = new Menikah();
            $menikah->jemaat_id = $jemaat->id;
            $menikah->nama_pasangan = $request->nama_pasangan;
            $menikah->tempat_lahir_pasangan = $request->tempat_lahir_pasangan;
            $menikah->tanggal_lahir_pasangan = $request->tanggal_lahir_pasangan;
            $menikah->nama_ayah_pasangan = $request->nama_ayah_pasangan;
            $menikah->nama_ibu_pasangan = $request->nama_ibu_pasangan;
            $menikah->tanggal_lahir_pasangan = $request->tanggal_lahir_pasangan;
            if ($request->hasFile('surat_baptis_pasangan')) {
                $file = $request->file('surat_baptis_pasangan');
                $filename = 'Surat Baptis' . '_' . $menikah->nama_pasangan  . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('surat-baptis-pasangan-menikah'), $filename);
                $menikah->surat_baptis_pasangan = $filename;
            }
            if ($request->hasFile('surat_sidi_pasangan')) {
                $file = $request->file('surat_sidi_pasangan');
                $filename = 'Surat Sidi' . '_' . $menikah->nama_pasangan  . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('surat-sidi-pasangan-menikah'), $filename);
                $menikah->surat_sidi_pasangan = $filename;
            }
            $menikah->tanggal_pernikahan = $request->tanggal_pernikahan;
            $menikah->status_menikah = 'Sudah Menikah';
            $menikah->save();
        }

        if ($request->filled('tanggal_baptis')) {
            $baptis = new Baptis();
            $baptis->jemaat_id = $jemaat->id;
            $baptis->tanggal_baptis = $request->tanggal_baptis;
            $baptis->status_baptis = 'Sudah Baptis';
            $baptis->save();
        }

        $sidi = null;
        if ($request->filled('tanggal_sidi')) {
            $sidi = new Sidi();
            $sidi->jemaat_id = $jemaat->id;
            $sidi->tanggal_sidi = $request->tanggal_sidi;
            if ($request->hasFile('surat_baptis')) {
                $file = $request->file('surat_baptis');
                $filename = 'Surat Baptis' . '_' . $sidi->jemaat->nama_lengkap  . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('surat-baptis-pendaftaran-sidi'), $filename);
                $sidi->surat_baptis = $filename;
            }
            $sidi->status_sidi = 'Sudah Sidi';
            $sidi->save();
        }

        return redirect('/data-jemaat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Jemaat::find($id);
        return view('pages.admin.data-jemaat.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Jemaat::find($id);
        return view('pages.admin.data-jemaat.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jemaat = Jemaat::find($id);
        $jemaat->nama_lengkap = $request->nama_lengkap;
        $jemaat->jenis_kelamin = $request->jenis_kelamin;
        $jemaat->tanggal_lahir = $request->tanggal_lahir;
        $jemaat->NIK = $request->NIK;
        $jemaat->alamat = $request->alamat;
        $jemaat->golongan_darah = $request->golongan_darah;
        $jemaat->nama_ayah = $request->nama_ayah;
        $jemaat->nama_ibu = $request->nama_ibu;
        $jemaat->status_vaksin = $request->status_vaksin;
        if ($request->hasFile('surat_akte_lahir')) {
            File::delete(public_path('surat-akte-lahir/' . $jemaat->nama_lengkap));
            $file = $request->file('surat_akte_lahir');
            $filename = 'Surat Akte Lahir' . '_' . $jemaat->nama_lengkap  . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('surat-akte-lahir'), $filename);
            $jemaat->surat_akte_lahir = $filename;
        }
        $jemaat->status_jemaat = 'Hidup';
        $jemaat->save();

        $user = User::where('id', $jemaat->user_id)->first();
        $user->update([
            'username' => $request->username,
            'password' => $request->password ? ($request->password) : ($user->password)
        ]);

        if ($request->tanggal_pernikahan !== null) {
            $dataMenikah = [
                'jemaat_id' => $jemaat->id,
                'nama_pasangan' => $request->nama_pasangan,
                'tempat_lahir_pasangan' => $request->tempat_lahir_pasangan,
                'tanggal_lahir_pasangan' => $request->tanggal_lahir_pasangan,
                'nama_ayah_pasangan' => $request->nama_ayah_pasangan,
                'nama_ibu_pasangan' => $request->nama_ibu_pasangan,
                'tanggal_pernikahan' => $request->tanggal_pernikahan,
            ];

            $menikah = Menikah::where('jemaat_id', $jemaat->id)->first();

            if ($request->hasFile('surat_baptis_pasangan')) {
                $file = $request->file('surat_baptis_pasangan');
                $filename = 'Surat Baptis' . '_' . $request->nama_pasangan . '.' . $file->getClientOriginalExtension();

                if ($menikah && $menikah->surat_baptis_pasangan) {
                    File::delete(public_path('surat-baptis-pasangan-menikah/' . $menikah->surat_baptis_pasangan));
                }

                $file->move(public_path('surat-baptis-pasangan-menikah'), $filename);
                $dataMenikah['surat_baptis_pasangan'] = $filename; // Update $dataMenikah array
            }

            if ($request->hasFile('surat_sidi_pasangan')) {
                $file = $request->file('surat_sidi_pasangan');
                $filename = 'Surat Sidi' . '_' . $request->nama_pasangan . '.' . $file->getClientOriginalExtension();

                if ($menikah && $menikah->surat_sidi_pasangan) {
                    File::delete(public_path('surat-sidi-pasangan-menikah/' . $menikah->surat_sidi_pasangan));
                }

                $file->move(public_path('surat-sidi-pasangan-menikah'), $filename);
                $dataMenikah['surat_sidi_pasangan'] = $filename;
            }

            $menikah = Menikah::updateOrCreate(
                ['jemaat_id' => $jemaat->id],
                $dataMenikah
            );

            if ($menikah) {
                $menikah->status_menikah = 'Sudah Menikah';
                $menikah->save();
            }
        }

        if ($request->tanggal_baptis !== null) {
            $dataBaptis = [
                'jemaat_id' => $jemaat->id,
                'tanggal_baptis' => $request->tanggal_baptis
            ];

            $baptis = Baptis::where('jemaat_id', $jemaat->id)->first();

            $baptis = Baptis::updateOrCreate(
                ['jemaat_id' => $jemaat->id],
                $dataBaptis
            );

            if ($baptis) {
                $baptis->status_baptis = 'Sudah Baptis';
                $baptis->save();
            }
        }

        if ($request->tanggal_sidi !== null) {
            $dataSidi = [
                'jemaat_id' => $jemaat->id,
                'tanggal_sidi' => $request->tanggal_sidi
            ];

            $sidi = Sidi::where('jemaat_id', $jemaat->id)->first();

            if ($request->hasFile('surat_baptis')) {
                $file = $request->file('surat_baptis');
                $filename = 'Surat Baptis' . '_' . $jemaat->nama_lengkap . '.' . $file->getClientOriginalExtension();

                if ($sidi && $sidi->surat_baptis) {
                    File::delete(public_path('surat-baptis-pendaftaran-sidi/' . $sidi->surat_baptis));
                }

                $file->move(public_path('surat-baptis-pendaftaran-sidi'), $filename);
                $dataSidi['surat_baptis'] = $filename;
            }

            $sidi = Sidi::updateOrCreate(
                ['jemaat_id' => $jemaat->id],
                $dataSidi
            );

            if ($sidi) {
                $sidi->status_sidi = 'Sudah Sidi';
                $sidi->save();
            }
        }

        return redirect('/data-jemaat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Jemaat::find($id);
        if ($data) {
            File::delete(public_path('surat-akte-lahir/' . $data->surat_akte_lahir));
        }

        $user = User::where('id', $data->user_id)->first();

        $menikah = Menikah::where('jemaat_id', $data->id)->first();
        if ($menikah) {
            File::delete(public_path('surat-baptis-pasangan-menikah/' . $menikah->surat_baptis_pasangan));
            File::delete(public_path('surat-sidi-pasangan-menikah/' . $menikah->surat_sidi_pasangan));
        }

        $sidi = Sidi::where('jemaat_id', $data->id)->first();
        if ($sidi) {
            File::delete(public_path('surat-baptis-pendaftaran-sidi/' . $sidi->surat_baptis));
        }

        $user->delete();

        return redirect('/data-jemaat');
    }

    public function unduhSuratAkteLahir($id)
    {
        $jemaat = Jemaat::find($id);

        if ($jemaat->surat_akte_lahir) {
            $filePath = public_path('/surat-akte-lahir' . '/' . $jemaat->surat_akte_lahir);

            if (File::exists($filePath)) {
                return Response::download($filePath);
            }
        }
    }
}
