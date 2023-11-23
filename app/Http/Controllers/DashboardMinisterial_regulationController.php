<?php

namespace App\Http\Controllers;

use App\Models\JenisPeraturanMenteri;
use App\Models\Ministerial_regulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardMinisterial_regulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        if (!empty($search)) {
            $regulations = Ministerial_regulation::where('nomor_peraturan', 'like', '%' . $search . '%')
                ->orWhere('tentang', 'like', '%' . $search . '%')
                ->orWhere('keterangan_status', 'like', '%' . $search . '%')
                ->latest()->paginate(10)->onEachSide(2)->fragment('reg');
        } else {
            $regulations = Ministerial_regulation::latest()->paginate(10)->fragment('reg')->onEachSide(2);
        }

        return view('dashboard.ministerialRegulation.index', [
            'title' => 'Peraturan Menteri BUMN',
            'link' => 'peraturan_menteri_bumn',
            'regulations' => $regulations,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.ministerialRegulation.create', [
            'title' => 'Tambah Peraturan Menteri BUMN',
            'link' => 'peraturan_menteri_bumn',
            'jenis_peraturan' => JenisPeraturanMenteri::all()
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
            'jenis_peraturan_menteri_id' => 'required',
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
        return view('dashboard.ministerialRegulation.show', [
            'title' => 'Detail Peraturan Menteri BUMN',
            'link' => 'peraturan_menteri_bumn',
            'regulation' => Ministerial_regulation::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('dashboard.ministerialRegulation.edit', [
            'title' => 'Edit Peraturan Menteri BUMN',
            'link' => 'peraturan_menteri_bumn',
            'regulation' => Ministerial_regulation::find($id),
            'jenis_peraturan' => JenisPeraturanMenteri::all(),
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
            'jenis_peraturan_menteri_id' => 'required',
            'status' => 'required',
            'keterangan_status' => 'nullable',
            'dokumen' => 'file',
        ];

        $request->validate($rules);

        if ($request->hasFile('dokumen')) {
            $regulation->nomor_peraturan = $request->nomor_peraturan;
            $regulation->tanggal_penetapan = $request->tanggal_penetapan;
            $regulation->tentang = $request->tentang;
            $regulation->jenis_peraturan_menteri_id = $request->jenis_peraturan_menteri_id;
            $regulation->status = $request->status;
            $regulation->keterangan_status = $request->keterangan_status;
            $regulation->dokumen = $request->file('dokumen')->store('regulation-documents', 'public');
            $regulation->save();
        } else {
            $regulation->nomor_peraturan = $request->nomor_peraturan;
            $regulation->tanggal_penetapan = $request->tanggal_penetapan;
            $regulation->tentang = $request->tentang;
            $regulation->jenis_peraturan_menteri_id = $request->jenis_peraturan_menteri_id;
            $regulation->status = $request->status;
            $regulation->keterangan_status = $request->keterangan_status;
            $regulation->save();
        }

        // Ministerial_regulation::where('id', $regulation->id)->update($validatedData);
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
