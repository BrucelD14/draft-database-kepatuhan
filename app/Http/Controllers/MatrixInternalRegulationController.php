<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatrixInternalRegulationController extends Controller
{
    public function index()
    {
        return view('matriks.peraturanInternal.index', [
            'title' => 'Matriks Peraturan Internal'
        ]);
    }
}
