<?php

namespace App\Charts;

use App\Models\ReviewEksternalReg;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class PeraturanEksternalChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($tahun): \ArielMejiaDev\LarapexCharts\BarChart
    {

        // ====MATRIKS 5 TAHUNAN====
        // $tahun = date('Y');
        // $periode = $tahun - 4;
        // for ($i = $periode; $i <= $tahun; $i++) {
        //     $totalUndangUndang = ReviewEksternalReg::whereYear('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 1)->count();
        //     $totalPeraturanPemerintah = ReviewEksternalReg::whereYear('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 2)->count();
        //     $dataTahun[] = $i;
        //     $dataTotalUndangUndang[] = $totalUndangUndang;
        //     $dataTotalPeraturanPemerintah[] = $totalPeraturanPemerintah;
        // };
        // return $this->chart->barChart()
        //     ->setTitle('Data Reviu Peraturan Eksternal')
        //     ->setSubtitle('Sejak 5 tahun terakhir.')
        //     ->addData('Undang-Undang', $dataTotalUndangUndang)
        //     ->addData('Peraturan Pemerintah', $dataTotalPeraturanPemerintah)
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
            $totalUndangUndang = ReviewEksternalReg::whereYear('tanggal_penetapan', $tahun)->whereMonth('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 1)->count();
            $totalPeraturanPemerintah = ReviewEksternalReg::whereYear('tanggal_penetapan', $tahun)->whereMonth('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 2)->count();
            if ($tahun == date('Y')) {
                $dataBulan[] = Carbon::create()->month($i)->translatedFormat('F');
            } else {
                $dataBulan[] = Carbon::create()->month($i)->translatedFormat('F');
            }
            $dataTotalUndangUndang[] = $totalUndangUndang;
            $dataTotalPeraturanPemerintah[] = $totalPeraturanPemerintah;
        };
        return $this->chart->barChart()
            ->setTitle('Data Reviu Peraturan Eksternal Tahun ' . $tahun)
            ->setSubtitle('Grafik bulanan')
            ->addData('Undang-Undang', $dataTotalUndangUndang)
            ->addData('Peraturan Pemerintah', $dataTotalPeraturanPemerintah)
            ->setColors(['#BF0000', '#1B1B1B',])
            ->setXAxis($dataBulan);
    }
}
