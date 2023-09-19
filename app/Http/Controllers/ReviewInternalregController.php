<?php

namespace App\Http\Controllers;

use App\Models\Review_internalreg;
use Illuminate\Http\Request;

class ReviewInternalregController extends Controller
{
    public function index()
    {
        return view('reviuInternalReg', [
            'title' => 'Reviu Peraturan Internal',
            'active' => 'reviu_peraturan_internal',
            'reg_list' => Review_internalreg::latest()->filter(request(['search']))->paginate(5)->withQueryString()
        ]);
    }
}
