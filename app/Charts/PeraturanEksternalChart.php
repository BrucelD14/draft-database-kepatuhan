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
            $totalUndangUndang = ReviewEksternalReg::whereYear('tanggal_penetapan', $tahun)->whereMonth('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 1)->where('status_publish', 1)->count();
            $totalPeraturanPemerintah = ReviewEksternalReg::whereYear('tanggal_penetapan', $tahun)->whereMonth('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 2)->where('status_publish', 1)->count();
            $totalPerPu = ReviewEksternalReg::whereYear('tanggal_penetapan', $tahun)->whereMonth('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 3)->where('status_publish', 1)->count();
            $totalPerPres = ReviewEksternalReg::whereYear('tanggal_penetapan', $tahun)->whereMonth('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 4)->where('status_publish', 1)->count();
            $totalInPres = ReviewEksternalReg::whereYear('tanggal_penetapan', $tahun)->whereMonth('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 5)->where('status_publish', 1)->count();

            if ($tahun == date('Y')) {
                $dataBulan[] = Carbon::create()->month($i)->translatedFormat('F');
            } else {
                $dataBulan[] = Carbon::create()->month($i)->translatedFormat('F');
            }

            $dataTotalUndangUndang[] = $totalUndangUndang;
            $dataTotalPeraturanPemerintah[] = $totalPeraturanPemerintah;
            $dataTotalPerPu[] = $totalPerPu;
            $dataTotalPerPres[] = $totalPerPres;
            $dataTotalInPres[] = $totalInPres;
        };
        return $this->chart->barChart()
            ->setTitle('Data Reviu Peraturan Eksternal Tahun ' . $tahun)
            ->setSubtitle('Grafik bulanan')
            ->addData('UU', $dataTotalUndangUndang)
            ->addData('PP', $dataTotalPeraturanPemerintah)
            ->addData('PERPU', $dataTotalPerPu)
            ->addData('PERPRES', $dataTotalPerPres)
            ->addData('INPRES', $dataTotalInPres)
            ->setColors(['#FFCC70', '#22668D', '#22634D', '#45124D', '#56321A',])
            ->setXAxis($dataBulan);
    }
}
