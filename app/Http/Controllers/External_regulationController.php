<?php

namespace App\Http\Controllers;

use App\Models\External_regulation;
use Illuminate\Http\Request;

class External_regulationController extends Controller
{
    public function index()
    {
        return view('externalRegulation.index', [
            'title' => 'Peraturan Eksternal',
            'active' => 'peraturan_eksternal',
            'reg_list' => External_regulation::latest()->filter(request(['search']))->paginate(5)->withQueryString()
        ]);
    }

    public function show($id)
    {
        $data = External_regulation::find($id);
        return view('externalRegulation.show', [
            'title' => 'Peraturan Eksternal',
            'active' => 'peraturan_eksternal',
            'link' => 'peraturan_eksternal',
            'regulation' => $data,
        ]);
    }
}
