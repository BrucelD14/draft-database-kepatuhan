<?php

namespace App\Http\Controllers;

use App\Models\JenisPeraturanInternal;
use Illuminate\Http\Request;

class DashboardJenisPeraturanInternalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.jenisPeraturanInternal.index', [
            'title' => 'Jenis Peraturan Internal',
            'link' => 'jenis_peraturan_internal',
            'jenisPeraturan' => JenisPeraturanInternal::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.jenisPeraturanInternal.create', [
            'title' => 'Jenis Peraturan Internal',
            'link' => 'jenis_peraturan_internal',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
        ]);

        JenisPeraturanInternal::create($validatedData);
        return redirect('/dashboard/jenis_peraturan_internal')->with('success', 'Jenis peraturan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisPeraturanInternal $jenisPeraturanInternal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPeraturanInternal $jenisPeraturanInternal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisPeraturanInternal $jenisPeraturanInternal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenisPeraturanInternal = JenisPeraturanInternal::find($id);
        JenisPeraturanInternal::destroy($id);
        return redirect('/dashboard/jenis_peraturan_internal')->with('success', 'Jenis peraturan telah dihapus');
    }
}
