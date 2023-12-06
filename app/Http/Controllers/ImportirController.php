<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportirController extends Controller
{
    public function index()
    {
        return view('dashboard.importir.index', [
            'title' => 'IMPORT FILE',
        ]);
    }
}
