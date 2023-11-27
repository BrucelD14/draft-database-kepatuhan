<?php

namespace App\Http\Controllers;

use App\Models\External_regulation;
use App\Models\Internal_regulation;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $eksternalReg = External_regulation::latest()->limit(2)->get();
        $internalReg = Internal_regulation::latest()->limit(2)->get();

        return view('index', [
            'title' => 'Landing Page',
            'eksternalRegulations' => $eksternalReg,
            'internalRegulations' => $internalReg,
        ]);
    }
}
