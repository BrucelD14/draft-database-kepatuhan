<?php

namespace App\Charts;

use App\Models\Internal_regulation;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use PhpParser\Node\Stmt\Echo_;

class PeraturanInternalChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $tahun = date('Y');
        $periode = $tahun - 4;
        for ($i = $periode; $i <= $tahun; $i++) {
            $totalPeraturanDireksi = Internal_regulation::whereYear('tanggal_penetapan', $i)->where('jenis_peraturan_internal_id', 1)->count();
            $totalSuratEdaran = Internal_regulation::whereYear('tanggal_penetapan', $i)->where('jenis_peraturan_internal_id', 2)->count();
            $dataTahun[] = $i;
            $dataTotalPeraturanDireksi[] = $totalPeraturanDireksi;
            $dataTotalSuratEdaran[] = $totalSuratEdaran;
        };
        return $this->chart->barChart()
            ->setTitle('Data Peraturan Internal')
            ->setSubtitle('Sejak 5 tahun terakhir.')
            ->addData('Peraturan Internal', $dataTotalPeraturanDireksi)
            ->addData('Surat Edaran', $dataTotalSuratEdaran)
            ->setColors(['#BF0000', '#1B1B1B',])
            ->setXAxis($dataTahun);
    }
}
