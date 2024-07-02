<?php

namespace App\Http\Controllers\Jemaat;

use App\Http\Controllers\Controller;
use App\Models\Jemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $data = Jemaat::where('user_id', $user->id)->first();

        $tanggal_lahir = \Carbon\Carbon::parse($data->tanggal_lahir);
        $umur = $tanggal_lahir->diffInYears(\Carbon\Carbon::now());

        if ($data->baptis && $data->baptis->status_baptis == 'Sudah Baptis' && !$data->sidi && $umur >= 16 && !session()->has('showSweetAlert')) {
            session()->flash('showSweetAlert', true);
        }

        return view('pages.jemaat.profil.index', compact('data'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
