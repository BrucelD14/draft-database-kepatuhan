<?php

namespace App\Http\Controllers;

use App\Models\Ministerial_regulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardMinisterial_regulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.regulations.index', [
            'title' => 'Peraturan Menteri BUMN',
            'link' => 'peraturan_menteri_bumn',
            'regulations' => Ministerial_regulation::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.regulations.create', [
            'title' => 'Tambah Peraturan Menteri BUMN',
            'link' => 'peraturan_menteri_bumn',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_peraturan' => 'required|max:255',
            'tanggal_penetapan' => 'required',
            'tentang' => 'required',
            'jenis_peraturan' => 'required',
            'status' => 'required',
            'keterangan_status' => 'nullable',
            'dokumen' => 'required|file',
        ]);

        $validatedData['dokumen'] = $request->file('dokumen')->store('regulation-documents', 'public');

        Ministerial_regulation::create($validatedData);
        return redirect('/dashboard/peraturan_menteri_bumn')->with('success', 'Peraturan baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('dashboard.regulations.show', [
            'title' => 'Detail Peraturan Menteri BUMN',
            'link' => 'peraturan_menteri_bumn',
            'regulation' => Ministerial_regulation::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('dashboard.regulations.edit', [
            'title' => 'Edit Peraturan Menteri BUMN',
            'link' => 'peraturan_menteri_bumn',
            'regulation' => Ministerial_regulation::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $regulation = Ministerial_regulation::find($id);

        $rules = [
            'nomor_peraturan' => 'required|max:255',
            'tanggal_penetapan' => 'required',
            'tentang' => 'required',
            'jenis_peraturan' => 'required',
            'status' => 'required',
            'keterangan_status' => 'nullable',
            'dokumen' => 'file',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('dokumen')) {
            if ($request->oldDokumen) {
                Storage::delete($request->oldDokumen);
            }
            $validatedData['dokumen'] = $request->file('dokumen')->store('regulation-documents', 'public');
        }

        Ministerial_regulation::where('id', $regulation->id)->update($validatedData);
        return redirect('/dashboard/peraturan_menteri_bumn')->with('success', 'Peraturan telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $regulation = Ministerial_regulation::find($id);
        if ($regulation->dokumen) {
            Storage::delete($regulation->dokumen);
        }
        Ministerial_regulation::destroy($id);
        return redirect('/dashboard/peraturan_menteri_bumn')->with('success', 'Peraturan telah dihapus');
    }
}
