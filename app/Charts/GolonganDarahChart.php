<?php

namespace App\Charts;

use App\Models\Jemaat;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class GolonganDarahChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
{
    $golonganDarahA = Jemaat::where('golongan_darah', 'A')->count();
    $golonganDarahB = Jemaat::where('golongan_darah', 'B')->count();
    $golonganDarahAB = Jemaat::where('golongan_darah', 'AB')->count();
    $golonganDarahO = Jemaat::where('golongan_darah', 'O')->count();

    return $this->chart->barChart()
        ->setTitle('Distribusi Golongan Darah Jemaat')
        ->setSubtitle('Jumlah Jemaat per Golongan Darah')
        ->addData('Jumlah Jemaat', [$golonganDarahA, $golonganDarahB, $golonganDarahAB, $golonganDarahO])
        ->setXAxis(['A', 'B', 'AB', 'O'])
        ->setColors(['#ff9933']);
}
}
