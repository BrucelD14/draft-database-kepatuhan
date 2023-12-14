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
            $totalKepPres = ReviewEksternalReg::whereYear('tanggal_penetapan', $tahun)->whereMonth('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 6)->where('status_publish', 1)->count();
            $totalSesMen = ReviewEksternalReg::whereYear('tanggal_penetapan', $tahun)->whereMonth('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 7)->where('status_publish', 1)->count();
            $totalPerMa = ReviewEksternalReg::whereYear('tanggal_penetapan', $tahun)->whereMonth('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 8)->where('status_publish', 1)->count();
            $totalPutusanMK = ReviewEksternalReg::whereYear('tanggal_penetapan', $tahun)->whereMonth('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 9)->where('status_publish', 1)->count();
            $totalPerMen = ReviewEksternalReg::whereYear('tanggal_penetapan', $tahun)->whereMonth('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 10)->where('status_publish', 1)->count();
            $totalKepMen = ReviewEksternalReg::whereYear('tanggal_penetapan', $tahun)->whereMonth('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 11)->where('status_publish', 1)->count();

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
            $dataTotalKepPres[] = $totalKepPres;
            $dataTotalSesMen[] = $totalSesMen;
            $dataTotalPerma[] = $totalPerMa;
            $dataTotalPutusanMK[] = $totalPutusanMK;
            $dataTotalPerMen[] = $totalPerMen;
            $dataTotalKepMen[] = $totalKepMen;
        };
        return $this->chart->barChart()
            ->setTitle('Data Reviu Peraturan Eksternal Tahun ' . $tahun)
            ->setSubtitle('Grafik bulanan')
            ->addData('UU', $dataTotalUndangUndang)
            ->addData('PP', $dataTotalPeraturanPemerintah)
            ->addData('PERPU', $dataTotalPerPu)
            ->addData('PERPRES', $dataTotalPerPres)
            ->addData('INPRES', $dataTotalInPres)
            ->addData('KEPPRES', $dataTotalKepPres)
            ->addData('SESMEN', $dataTotalSesMen)
            ->addData('PERMA', $dataTotalPerma)
            ->addData('Putusan MK', $dataTotalPutusanMK)
            ->addData('PERMEN', $dataTotalPerMen)
            ->addData('KEPMEN', $dataTotalKepMen)
            // ->setColors(['#186F65', '#B5CB99', '#FCE09B', '#B2533E', '#A9A9A9', '#FECDA6', '#FF9130', '#FF5B22', '#8ACDD7', '#FA7070', '#9ED2BE'])
            ->setColors(['#ff0000', '#ffa500', '#ffff00', '#008000', '#0000ff', '#6f00ff', '#964b00', '#bf00ff', '#a9a9a9', '#ff1493', '#add8e6'])
            ->setXAxis($dataBulan);
    }
}
