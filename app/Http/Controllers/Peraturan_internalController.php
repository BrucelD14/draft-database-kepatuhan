<?php

namespace App\Http\Controllers;

use App\Models\Peraturan_internal;
use Illuminate\Http\Request;

class Peraturan_internalController extends Controller
{
    public function index()
    {
        return view('perinternal', [
            'title' => 'Peraturan Internal',
            'reg_list' => Peraturan_internal::all()
        ]);
    }
}
