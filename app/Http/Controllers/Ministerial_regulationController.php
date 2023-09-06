<?php

namespace App\Http\Controllers;

use App\Models\Ministerial_regulation;
use Illuminate\Http\Request;

class Ministerial_regulationController extends Controller
{
    public function index()
    {
        return view('ministerialReg', [
            'title' => 'Peraturan Menteri BUMN',
            'reg_list' => Ministerial_regulation::all()
        ]);
    }
}