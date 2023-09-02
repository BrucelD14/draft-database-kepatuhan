<?php

namespace App\Http\Controllers;

use App\Models\Internal_regulation;
use Illuminate\Http\Request;

class Internal_regulationController extends Controller
{
    public function index()
    {
        return view('perinternal', [
            'title' => 'Peraturan Internal',
            'reg_list' => Internal_regulation::all()
        ]);
    }
}
