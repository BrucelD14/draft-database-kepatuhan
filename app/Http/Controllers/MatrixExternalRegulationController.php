<?php

namespace App\Http\Controllers;

use App\Charts\PeraturanEksternalChart;
use App\Models\ReviewEksternalReg;
use Illuminate\Http\Request;

class MatrixExternalRegulationController extends Controller
{
    public function index(PeraturanEksternalChart $chart, Request $request)
    {
        // $tahun = date('Y');
        $year = $request->query('tahun');
        if (empty($year)) {
            $tahun = date('Y');
        } else {
            $tahun = $year;
        }
        $periode = $tahun - 4;
        for ($i = $periode; $i <= $tahun; $i++) {
            $totalUndangUndang = ReviewEksternalReg::whereYear('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 1)->where('status_publish', 1)->count();
            $totalPeraturanPemerintah = ReviewEksternalReg::whereYear('tanggal_penetapan', $i)->where('jenis_peraturan_eksternal_id', 2)->where('status_publish', 1)->count();
            $dataTahun[] = $i;
            $dataTotalUndangUndang[] = $totalUndangUndang;
            $dataTotalPeraturanPemerintah[] = $totalPeraturanPemerintah;
        };
        return view('matriks.peraturanEksternal.index', [
            'title' => 'Matriks Reviu Peraturan Eksternal',
            'chart' => $chart->build($tahun),
            'periode' => $dataTahun,
            'undangUndang' => $dataTotalUndangUndang,
            'peraturanPemerintah' => $dataTotalPeraturanPemerintah,
            'tahun' => $tahun
        ]);
    }
}
