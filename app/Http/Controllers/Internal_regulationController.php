<?php

namespace App\Http\Controllers;

use App\Models\Internal_regulation;
use Illuminate\Http\Request;

class Internal_regulationController extends Controller
{
    public function index()
    {

        return view('regulations', [
            'title' => 'Peraturan Internal',
            'active' => 'peraturan_internal_perusahaan',
            // 'reg_list' => Internal_regulation::all(),
            'reg_list' => Internal_regulation::latest()->filter(request(['search']))->paginate(3)->withQueryString()
        ]);
    }
}
