<?php

namespace App\Http\Controllers;

use App\Models\External_regulation;
use App\Models\Internal_regulation;
use App\Models\Ministerial_regulation;
use App\Models\Review_internalreg;
use App\Models\ReviewEksternalReg;
use Illuminate\Http\Request;

class Product_lawController extends Controller
{
    public function index()
    {
        $internalReg = Internal_regulation::latest()->limit(1)->get();
        $externalReg = External_regulation::latest()->limit(1)->get();
        $ministerialReg = Ministerial_regulation::latest()->limit(1)->get();
        $internalRev = Review_internalreg::latest()->limit(1)->get();
        $externalRev = ReviewEksternalReg::latest()->where('status_publish', 1)->limit(1)->get();

        return view('produk', [
            'title' => 'Produk Hukum',
            'internalReg' => $internalReg,
            'externalReg' => $externalReg,
            'ministerialReg' => $ministerialReg,
            'internalRev' => $internalRev,
            'externalRev' => $externalRev,
        ]);
    }
}
