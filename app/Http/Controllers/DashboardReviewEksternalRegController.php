<?php

namespace App\Http\Controllers;

use App\Models\JenisPeraturanEksternal;
use App\Models\KategoriDivisi;
use App\Models\ReviewEksternalReg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class DashboardReviewEksternalRegController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.reviewExternal.index', [
            'title' => 'Reviu Peraturan Eksternal',
            'link' => 'reviu_peraturan_eksternal',
            'regulations' => ReviewEksternalReg::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.reviewExternal.create', [
            'title' => 'Tambah Reviu Peraturan Eksternal',
            'link' => 'reviu_peraturan_eksternal',
            'jenis_peraturan' => JenisPeraturanEksternal::all(),
            'kategori_divisi' => KategoriDivisi::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $uuid = Uuid::uuid4();

        $validatedData = $request->validate([
            'nomor_peraturan' => 'required|max:255',
            'tanggal_penetapan' => 'required',
            'jenis_peraturan_eksternal_id' => 'required',
            'status' => 'required',
            'tentang' => 'required',
            'ringkasan' => 'required',
            'edisi' => 'required',
            'dokumen' => 'required|file',
        ]);
        $validatedData['uuid'] = $uuid;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['dokumen'] = $request->file('dokumen')->store('review-documents', 'public');
        $kategoriDivisi = $request->divisi;
        ReviewEksternalReg::create($validatedData);

        if (is_array($kategoriDivisi)) {
            foreach ($kategoriDivisi as $option) {
                // Simpan setiap nilai ke dalam tabel database
                DB::table('kategori_divisi_reviu')
                    ->insert([
                        'uuid_review_eksternal_reg' => $uuid,
                        'kategori_divisi_id' => $option,
                    ]);
            }
        }
        // dd($request->id); //hasilnya null
        // proses input id reviu dan id divisi ke dalam table kategori divisi riviu
        // cara tangkap id dari reviu yang baru di store
        return redirect('/dashboard/reviu_peraturan_eksternal')->with('success', 'Reviu peraturan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('dashboard.reviewExternal.show', [
            'title' => 'Detail Reviu Peraturan Eksternal',
            'link' => 'reviu_peraturan_eksternal',
            'regulation' => ReviewEksternalReg::find($id),
            'divisi' => KategoriDivisi::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('dashboard.reviewExternal.edit', [
            'title' => 'Edit Reviu Peraturan Eksternal',
            'link' => 'reviu_peraturan_eksternal',
            'regulation' => ReviewEksternalReg::find($id),
            'jenis_peraturan' => JenisPeraturanEksternal::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $regulation = ReviewEksternalReg::find($id);

        $rules = [
            'nomor_peraturan' => 'required|max:255',
            'tanggal_penetapan' => 'required',
            'jenis_peraturan_eksternal_id' => 'required',
            'status' => 'required',
            'tentang' => 'required',
            'ringkasan' => 'required',
            'divisi' => 'required',
            'edisi' => 'required',
            'dokumen' => 'required|file',
        ];

        $request->validate($rules);

        // dd($request);

        if ($request->hasFile('dokumen')) {
            $regulation->nomor_peraturan = $request->nomor_peraturan;
            $regulation->tanggal_penetapan = $request->tanggal_penetapan;
            $regulation->jenis_peraturan_eksternal_id = $request->jenis_peraturan_eksternal_id;
            $regulation->status = $request->status;
            $regulation->tentang = $request->tentang;
            $regulation->ringkasan = $request->ringkasan;
            $regulation->divisi = $request->divisi;
            $regulation->edisi = $request->edisi;
            $regulation->dokumen = $request->file('dokumen')->store('review-documents', 'public');
            $regulation->save();
        } else {
            $regulation->nomor_peraturan = $request->nomor_peraturan;
            $regulation->tanggal_penetapan = $request->tanggal_penetapan;
            $regulation->jenis_peraturan_eksternal_id = $request->jenis_peraturan_eksternal_id;
            $regulation->status = $request->status;
            $regulation->tentang = $request->tentang;
            $regulation->ringkasan = $request->ringkasan;
            $regulation->divisi = $request->divisi;
            $regulation->edisi = $request->edisi;
            $regulation->save();
        }

        return redirect('/dashboard/reviu_peraturan_eksternal')->with('success', 'Reviu telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $regulation = ReviewEksternalReg::find($id);
        if ($regulation->dokumen) {
            Storage::delete($regulation->dokumen);
        }
        ReviewEksternalReg::destroy($id);
        return redirect('/dashboard/reviu_peraturan_eksternal')->with('success', 'Reviu telah dihapus');
    }
}
