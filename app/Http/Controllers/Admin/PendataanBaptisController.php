<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Baptis;
use Illuminate\Http\Request;

class PendataanBaptisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Baptis::all();
        return view('pages.admin.pendataan-baptis.index', compact('data'));
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
        $baptis = Baptis::find($id);

        if ($request->input('action_type') == 'konfirmasi_baptis') {
            $baptis->status_baptis = 'Dikonfirmasi';
        } elseif ($request->input('action_type') == 'sudah_baptis') {
            $baptis->status_baptis = 'Sudah Baptis';
        }

        $baptis->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
