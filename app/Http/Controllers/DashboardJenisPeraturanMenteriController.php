<?php

namespace App\Http\Controllers;

use App\Models\JenisPeraturanMenteri;
use Illuminate\Http\Request;

class DashboardJenisPeraturanMenteriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.jenisPeraturanMenteri.index', [
            'title' => 'Jenis Peraturan Menteri',
            'link' => 'jenis_peraturan_menteri',
            'jenisPeraturan' => JenisPeraturanMenteri::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.jenisPeraturanMenteri.create', [
            'title' => 'Jenis Peraturan Menteri',
            'link' => 'jenis_peraturan_menteri',
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

        JenisPeraturanMenteri::create($validatedData);
        return redirect('/dashboard/jenis_peraturan_menteri')->with('success', 'Jenis peraturan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisPeraturanMenteri $jenisPeraturanMenteri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('dashboard.jenisPeraturanMenteri.edit', [
            'title' => 'Jenis Peraturan Menteri',
            'link' => 'jenis_peraturan_menteri',
            'jenisPeraturan' => JenisPeraturanMenteri::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jenisPeraturan = JenisPeraturanMenteri::find($id);

        $rules = [
            'nama' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);
        $jenisPeraturan->update($validatedData);

        return redirect('/dashboard/jenis_peraturan_menteri')->with('success', 'Jenis peraturan telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        JenisPeraturanMenteri::destroy($id);
        return redirect('/dashboard/jenis_peraturan_menteri')->with('success', 'Jenis peraturan telah dihapus');
    }
}
