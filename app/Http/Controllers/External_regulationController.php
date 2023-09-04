<?php

namespace App\Http\Controllers;

use App\Models\External_regulation;
use Illuminate\Http\Request;

class External_regulationController extends Controller
{
    public function index()
    {
        return view('externalReg', [
            'title' => 'Peraturan Eksternal',
            'reg_list' => External_regulation::all()
        ]);
    }
}
