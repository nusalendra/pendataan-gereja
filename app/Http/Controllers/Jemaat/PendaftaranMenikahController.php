<?php

namespace App\Http\Controllers\Jemaat;

use App\Http\Controllers\Controller;
use App\Models\Jemaat;
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
        //
    }
}
