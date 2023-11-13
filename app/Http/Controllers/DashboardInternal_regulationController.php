<?php

namespace App\Http\Controllers;

use App\Models\Internal_regulation;
use App\Models\JenisPeraturanInternal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardInternal_regulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.regulations.index', [
            'title' => 'Peraturan Internal',
            'link' => 'peraturan_internal',
            'regulations' => Internal_regulation::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.regulations.create', [
            'title' => 'Tambah Peraturan Internal',
            'link' => 'peraturan_internal',
            'jenis_peraturan' => JenisPeraturanInternal::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_peraturan' => 'required|unique:internal_regulations|max:255',
            'tanggal_penetapan' => 'required',
            'tentang' => 'required',
            'jenis_peraturan_internal_id' => 'required',
            'status' => 'required',
            // 'visibility' => 'nullable',
            'keterangan_status' => 'nullable',
            'dokumen' => 'required|file',
        ]);

        // $validatedData['keterangan_status'] = $request['keterangan_status'];
        $validatedData['dokumen'] = $request->file('dokumen')->store('regulation-documents', 'public');

        Internal_regulation::create($validatedData);
        return redirect('/dashboard/peraturan_internal')->with('success', 'Peraturan baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // return Internal_regulation::find($id);
        return view('dashboard.regulations.show', [
            'title' => 'Detail Peraturan Internal',
            'link' => 'peraturan_internal',
            'regulation' => Internal_regulation::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('dashboard.regulations.edit', [
            'title' => 'Edit Peraturan Internal',
            'link' => 'peraturan_internal',
            'regulation' => Internal_regulation::find($id),
            'jenis_peraturan' => JenisPeraturanInternal::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $regulation = Internal_regulation::find($id);

        $rules = [
            'nomor_peraturan' => 'required|max:255',
            'tanggal_penetapan' => 'required',
            'tentang' => 'required',
            'jenis_peraturan_internal_id' => 'required',
            'status' => 'required',
            // 'visibility' => 'nullable',
            'keterangan_status' => 'required',
            'dokumen' => 'file',
        ];

        // if ($request->slug != $regulation->slug) {
        //     $rules['slug'] = 'required|unique:internal_regulations|max:255';
        // }

        $request->validate($rules);

        // if ($request->file('dokumen')) {
        //     if ($request->oldDokumen) {
        //         Storage::delete($request->oldDokumen);
        //     }
        //     $validatedData['dokumen'] = $request->file('dokumen')->store('regulation-documents', 'public');
        // }

        if ($request->hasFile('dokumen')) {
            $regulation->nomor_peraturan = $request->nomor_peraturan;
            $regulation->tanggal_penetapan = $request->tanggal_penetapan;
            $regulation->tentang = $request->tentang;
            $regulation->jenis_peraturan_internal_id = $request->jenis_peraturan_internal_id;
            $regulation->status = $request->status;
            // $regulation->visibility = $request->visibility;
            $regulation->keterangan_status = $request->keterangan_status;
            $regulation->dokumen = $request->file('dokumen')->store('regulation-documents', 'public');
            $regulation->save();
        } else {
            $regulation->nomor_peraturan = $request->nomor_peraturan;
            $regulation->tanggal_penetapan = $request->tanggal_penetapan;
            $regulation->tentang = $request->tentang;
            $regulation->jenis_peraturan_internal_id = $request->jenis_peraturan_internal_id;
            $regulation->status = $request->status;
            // $regulation->visibility = $request->visibility;
            $regulation->keterangan_status = $request->keterangan_status;
            $regulation->save();
        }

        // Internal_regulation::where('id', $regulation->id)->update($validatedData);
        return redirect('/dashboard/peraturan_internal')->with('success', 'Peraturan telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $internalRegulation = Internal_regulation::find($id);
        if ($internalRegulation->dokumen) {
            Storage::delete($internalRegulation->dokumen);
        }
        Internal_regulation::destroy($id);
        return redirect('/dashboard/peraturan_internal')->with('success', 'Peraturan telah dihapus');
    }

    // public function checkSlug(Request $request)
    // {
    //     $slug = SlugService::createSlug(Internal_regulation::class, 'slug', $request->nomor_peraturan);
    //     return response()->json(['slug' => $slug]);
    // }
}
