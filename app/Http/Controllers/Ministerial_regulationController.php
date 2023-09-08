<?php

namespace App\Http\Controllers;

use App\Models\Ministerial_regulation;
use Illuminate\Http\Request;

class Ministerial_regulationController extends Controller
{
    public function index()
    {
        return view('regulations', [
            'title' => 'Peraturan Menteri BUMN',
            'active' => 'peraturan_menteri_bumn',
            'reg_list' => Ministerial_regulation::latest()->filter(request(['search']))->paginate(3)->withQueryString()
        ]);
    }
}
