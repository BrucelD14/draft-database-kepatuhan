<?php

namespace App\Http\Controllers;

use App\Models\Internal_regulation;
use App\Models\ReviewEksternalReg;
use Illuminate\Http\Request;

class MatrixController extends Controller
{
    public function index()

    {
        $year = date('Y');
        $internalRegCount = Internal_regulation::whereYear('tanggal_penetapan', $year)->count();
        $externalRevCount = ReviewEksternalReg::whereYear('tanggal_penetapan', $year)->where('status_publish', 1)->count();

        return view('matriks.index', [
            'title' => 'Matriks Peraturan',
            'internalRegCount' => $internalRegCount,
            'externalRevCount' => $externalRevCount,
            'year' => $year,
        ]);
    }
}
