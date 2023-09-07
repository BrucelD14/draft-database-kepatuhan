<?php

namespace App\Http\Controllers;

use App\Models\External_regulation;
use Illuminate\Http\Request;

class External_regulationController extends Controller
{
    public function index()
    {
        return view('regulations', [
            'title' => 'Peraturan Eksternal',
            'active' => 'peraturan_eksternal',
            'reg_list' => External_regulation::latest()->filter(request(['search']))->paginate(4)->withQueryString()
        ]);
    }
}
