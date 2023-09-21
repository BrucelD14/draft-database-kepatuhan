<?php

namespace App\Http\Controllers;

use App\Models\ReviewEksternalReg;
use Illuminate\Http\Request;

class ReviewEksternalRegController extends Controller
{
    public function index()
    {
        return view('reviewEksternalReg.index', [
            'title' => 'Reviu Peraturan Eksterhal',
            'active' => 'reviu_peraturan_eksternal',
            'reg_list' => ReviewEksternalReg::latest()->filter(request(['search']))->paginate(5)->withQueryString()
        ]);
    }
}
