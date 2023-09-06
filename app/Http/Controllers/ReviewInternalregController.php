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
            'reg_list' => Review_internalreg::latest()->get()
        ]);
    }
}
