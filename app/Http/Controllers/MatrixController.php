<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatrixController extends Controller
{
    public function index()
    {
        return view('matriks.index', [
            'title' => 'Matriks Peraturan',
        ]);
    }
}
