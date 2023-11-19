<?php

namespace App\Http\Controllers;

use App\Models\Ministerial_regulation;
use Illuminate\Http\Request;

class Ministerial_regulationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        return view('ministerialRegulation.index', [
            'title' => 'Peraturan Menteri BUMN',
            'active' => 'peraturan_menteri_bumn',
            'reg_list' => Ministerial_regulation::latest()->filter(request(['search']))->paginate(5)->withQueryString(),
            'search' => $search
        ]);
    }

    public function show($id)
    {
        $data = Ministerial_regulation::find($id);
        return view('ministerialRegulation.show', [
            'title' => 'Peraturan Menteri BUMN',
            'active' => 'peraturan_menteri_bumn',
            'link' => 'peraturan_menteri_bumn',
            'regulation' => $data,
        ]);
    }
}
