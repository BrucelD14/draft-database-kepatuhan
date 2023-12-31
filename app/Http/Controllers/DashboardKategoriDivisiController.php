<?php

namespace App\Http\Controllers;

use App\Imports\DivisiImport;
use App\Models\KategoriDivisi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        return view('dashboard.kategoriDivisi.create', [
            'title' => 'Kategori Divisi',
            'link' => 'kategori_divisi',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'div_code' => 'required|max:255',
            'div_name' => 'required|max:255',
        ]);

        KategoriDivisi::create($validatedData);
        return redirect('/dashboard/kategori_divisi')->with('success', 'Kategori divisi berhasil ditambahkan');
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
    public function edit($id)
    {
        return view('dashboard.kategoriDivisi.edit', [
            'title' => 'Kategori Divisi',
            'link' => 'kategori_divisi',
            'kategori' => KategoriDivisi::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kategori = KategoriDivisi::find($id);

        $rules = [
            'div_code' => 'required|max:255',
            'div_name' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);
        $kategori->update($validatedData);


        return redirect('/dashboard/kategori_divisi')->with('success', 'Kategori divisi telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        KategoriDivisi::destroy($id);
        return redirect('/dashboard/kategori_divisi')->with('success', 'Kategori divisi telah dihapus');
    }

    public function import(Request $request)
    {
        $request->validate([
            'importir_divisi' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new DivisiImport, $request->file('importir_divisi')->store('importir'));

        return redirect('/dashboard/importir')->with('success', 'Berhasil Import Divisi');
        // return back();
    }
}
