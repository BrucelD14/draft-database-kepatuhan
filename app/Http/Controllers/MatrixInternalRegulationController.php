<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\PeraturanInternalChart;

class MatrixInternalRegulationController extends Controller
{
    public function index(PeraturanInternalChart $chart)
    {
        return view('matriks.peraturanInternal.index', [
            'title' => 'Matriks Peraturan Internal',
            'chart' => $chart->build(),
        ]);
    }
}
