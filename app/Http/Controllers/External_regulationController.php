<?php

namespace App\Http\Controllers;

use App\Models\External_regulation;
use Illuminate\Http\Request;

class External_regulationController extends Controller
{
    public function index()
    {
        return view('internalReg', [
            'title' => 'Peraturan Eksternal',
            'reg_list' => External_regulation::latest()->get()
        ]);
    }
}
