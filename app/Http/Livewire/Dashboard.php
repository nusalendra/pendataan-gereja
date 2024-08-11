<?php

namespace App\Http\Livewire;

use App\Charts\GolonganDarahChart;
use App\Models\Jemaat;
use Livewire\Component;

class Dashboard extends Component
{
    public function render(GolonganDarahChart $golonganDarahChart)
    {
        $jemaatTerdaftarMenikah = Jemaat::whereHas('menikah', function ($query) {
            $query->where('status_menikah', 'Sudah Menikah');
        })->count();
        $jemaatBelumMenikah = Jemaat::whereDoesntHave('menikah')->count();
        
        $jemaatTerdaftarSidi = Jemaat::whereHas('sidi', function ($query) {
            $query->where('status_sidi', 'Sudah Sidi');
        })->count();
        $jemaatBelumSidi = Jemaat::whereDoesntHave('sidi')->count();

        $jemaatTerdaftarBaptis = Jemaat::whereHas('baptis', function ($query) {
            $query->where('status_baptis', 'Sudah Baptis');
        })->count();
        $jemaatBelumBaptis = Jemaat::whereDoesntHave('baptis')->count();

        $jemaatMeninggal = Jemaat::where('status_jemaat', 'Meninggal')->count();

        $jemaatPria = Jemaat::where('jenis_kelamin', 'Pria')->count();
        $jemaatWanita = Jemaat::where('jenis_kelamin', 'Wanita')->count();
        $jemaatTidakDiisi = Jemaat::whereNull('jenis_kelamin')->count();
        $jemaatTerdaftar = Jemaat::count();

        return view('livewire.dashboard', compact('jemaatTerdaftarMenikah', 'jemaatBelumMenikah', 'jemaatTerdaftarSidi', 'jemaatBelumSidi', 'jemaatTerdaftarBaptis', 'jemaatBelumBaptis', 'jemaatMeninggal', 'jemaatPria', 'jemaatWanita', 'jemaatTidakDiisi', 'jemaatTerdaftar'), ['golonganDarahChart' => $golonganDarahChart->build()]);
    }
}
