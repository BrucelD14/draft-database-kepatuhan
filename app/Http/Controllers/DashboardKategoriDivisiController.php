<?php

namespace App\Http\Controllers;

use App\Models\KategoriDivisi;
use Illuminate\Http\Request;

class DashboardKategoriDivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kategoriDivisi.index', [
            'title' => 'Kategori Divisi',
            'link' => 'kategori_divisi',
            'kategori' => KategoriDivisi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriDivisi $kategoriDivisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriDivisi $kategoriDivisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriDivisi $kategoriDivisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriDivisi $kategoriDivisi)
    {
        //
    }
}