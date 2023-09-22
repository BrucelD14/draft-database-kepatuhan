<?php

namespace App\Http\Controllers;

use App\Models\External_regulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardExternal_regulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.regulations.index', [
            'title' => 'Peraturan Eksternal',
            'link' => 'peraturan_eksternal',
            'regulations' => External_regulation::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.regulations.create', [
            'title' => 'Tambah Peraturan Eksternal',
            'link' => 'peraturan_eksternal',
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

        External_regulation::create($validatedData);
        return redirect('/dashboard/peraturan_eksternal')->with('success', 'Peraturan baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('dashboard.regulations.show', [
            'title' => 'Detail Peraturan Eksternal',
            'link' => 'peraturan_eksternal',
            'regulation' => External_regulation::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('dashboard.regulations.edit', [
            'title' => 'Edit Peraturan Eksternal',
            'link' => 'peraturan_eksternal',
            'regulation' => External_regulation::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $regulation = External_regulation::find($id);

        $rules = [
            'nomor_peraturan' => 'required|max:255',
            'tanggal_penetapan' => 'required',
            'tentang' => 'required',
            'jenis_peraturan' => 'required',
            'status' => 'required',
            'keterangan_status' => 'nullable',
            'dokumen' => 'file',
        ];

        $request->validate($rules);

        if ($request->hasFile('dokumen')) {
            $regulation->nomor_peraturan = $request->nomor_peraturan;
            $regulation->tanggal_penetapan = $request->tanggal_penetapan;
            $regulation->tentang = $request->tentang;
            $regulation->jenis_peraturan = $request->jenis_peraturan;
            $regulation->status = $request->status;
            $regulation->keterangan_status = $request->keterangan_status;
            $regulation->dokumen = $request->file('dokumen')->store('regulation-documents', 'public');
            $regulation->save();
        } else {
            $regulation->nomor_peraturan = $request->nomor_peraturan;
            $regulation->tanggal_penetapan = $request->tanggal_penetapan;
            $regulation->tentang = $request->tentang;
            $regulation->jenis_peraturan = $request->jenis_peraturan;
            $regulation->status = $request->status;
            $regulation->keterangan_status = $request->keterangan_status;
            $regulation->save();
        }

        // External_regulation::where('id', $regulation->id)->update($validatedData);
        return redirect('/dashboard/peraturan_eksternal')->with('success', 'Peraturan telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $regulation = External_regulation::find($id);
        if ($regulation->dokumen) {
            Storage::delete($regulation->dokumen);
        }
        External_regulation::destroy($id);
        return redirect('/dashboard/peraturan_eksternal')->with('success', 'Peraturan telah dihapus');
    }
}
