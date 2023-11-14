<?php

namespace App\Charts;

use App\Models\Internal_regulation;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Echo_;

class PeraturanInternalChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($tahun): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // ===MATRIKS 5 TAHUNAN===
        // $tahun = date('Y');
        // $periode = $tahun - 4;
        // for ($i = $periode; $i <= $tahun; $i++) {
        //     $totalPeraturanDireksi = Internal_regulation::whereYear('tanggal_penetapan', $i)->where('jenis_peraturan_internal_id', 1)->count();
        //     $totalSuratEdaran = Internal_regulation::whereYear('tanggal_penetapan', $i)->where('jenis_peraturan_internal_id', 2)->count();
        //     $dataTahun[] = $i;
        //     $dataTotalPeraturanDireksi[] = $totalPeraturanDireksi;
        //     $dataTotalSuratEdaran[] = $totalSuratEdaran;
        // };
        // return $this->chart->barChart()
        //     ->setTitle('Data Peraturan Internal')
        //     ->setSubtitle('Sejak 5 tahun terakhir.')
        //     ->addData('Peraturan Internal', $dataTotalPeraturanDireksi)
        //     ->addData('Surat Edaran', $dataTotalSuratEdaran)
        //     ->setColors(['#BF0000', '#1B1B1B',])
        //     ->setXAxis($dataTahun);

        // ===MATRIKS BULANAN===
        $tahun = $tahun;
        if ($tahun == date('Y')) {
            $bulan = date('m');
        } else {
            $bulan = date('m') + (12 - date('m'));
        }
        for ($i = 1; $i <= $bulan; $i++) {
            $totalPeraturanDireksi = Internal_regulation::whereYear('tanggal_penetapan', $tahun)->whereMonth('tanggal_penetapan', $i)->where('jenis_peraturan_internal_id', 1)->count();
            $totalSuratEdaran = Internal_regulation::whereYear('tanggal_penetapan', $tahun)->whereMonth('tanggal_penetapan', $i)->where('jenis_peraturan_internal_id', 2)->count();
            if ($tahun == date('Y')) {
                $dataBulan[] = Carbon::create()->month($i)->translatedFormat('F');
            } else {
                $dataBulan[] = Carbon::create()->month($i)->translatedFormat('F');
            }
            $dataTotalPeraturanDireksi[] = $totalPeraturanDireksi;
            $dataTotalSuratEdaran[] = $totalSuratEdaran;
        };
        return $this->chart->barChart()
            ->setTitle('Data Peraturan Internal Tahun ' . $tahun)
            ->setSubtitle('Grafik Bulanan')
            ->addData('Peraturan Direksi', $dataTotalPeraturanDireksi)
            ->addData('Surat Edaran', $dataTotalSuratEdaran)
            ->setColors(['#FFCC70', '#22668D',])
            ->setXAxis($dataBulan);
        // ->setYAxis();
    }
}
