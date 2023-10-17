<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\PeraturanInternalChart;
use App\Models\Internal_regulation;

class MatrixInternalRegulationController extends Controller
{
    public function index(PeraturanInternalChart $chart, Request $request)
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
            $totalPeraturanDireksi = Internal_regulation::whereYear('tanggal_penetapan', $i)->where('jenis_peraturan_internal_id', 1)->count();
            $totalSuratEdaran = Internal_regulation::whereYear('tanggal_penetapan', $i)->where('jenis_peraturan_internal_id', 2)->count();
            $dataTahun[] = $i;
            $dataTotalPeraturanDireksi[] = $totalPeraturanDireksi;
            $dataTotalSuratEdaran[] = $totalSuratEdaran;
        };
        return view('matriks.peraturanInternal.index', [
            'title' => 'Matriks Peraturan Internal',
            'chart' => $chart->build($tahun),
            'periode' => $dataTahun,
            'peraturanDireksi' => $dataTotalPeraturanDireksi,
            'suratEdaran' => $dataTotalSuratEdaran,
            'peraturan' => Internal_regulation::all(),
            'tahun' => $tahun
        ]);
    }
}
