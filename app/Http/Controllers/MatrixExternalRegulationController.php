<?php

namespace App\Http\Controllers;

use App\Charts\PeraturanEksternalChart;
use App\Models\ReviewEksternalReg;
use Illuminate\Http\Request;

class MatrixExternalRegulationController extends Controller
{
    public function index(PeraturanEksternalChart $chart)
    {
        $tahun = date('Y');
        $periode = $tahun - 4;
        for ($i = $periode; $i <= $tahun; $i++) {
            $totalUndangUndang = ReviewEksternalReg::whereYear('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 1)->count();
            $totalPeraturanPemerintah = ReviewEksternalReg::whereYear('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 2)->count();
            $dataTahun[] = $i;
            $dataTotalUndangUndang[] = $totalUndangUndang;
            $dataTotalPeraturanPemerintah[] = $totalPeraturanPemerintah;
        };
        return view('matriks.peraturanEksternal.index', [
            'title' => 'Matriks Reviu Peraturan Eksternal',
            'chart' => $chart->build(),
            'periode' => $dataTahun,
            'undangUndang' => $dataTotalUndangUndang,
            'peraturanPemerintah' => $dataTotalPeraturanPemerintah,
        ]);
    }
}
