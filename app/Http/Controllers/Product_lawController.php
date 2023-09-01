<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Product_lawController extends Controller
{
    public function index()
    {
        return view('produk', [
            'title' => 'Produk Hukum'
        ]);
    }
}
