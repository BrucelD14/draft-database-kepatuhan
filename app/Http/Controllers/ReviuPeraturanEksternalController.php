<?php

namespace App\Http\Controllers;

use App\Models\JenisPeraturanEksternal;
use App\Models\KategoriDivisi;
use App\Models\KategoriDivisiReviu;
use App\Models\ReviewEksternalReg;
use Illuminate\Http\Request;

class ReviuPeraturanEksternalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchKeyword = $request->input('search');
        $selectOptionValue = $request->input('selectedCategory');
        $selectOptionValueJenis = $request->input('selectedJenis');

        $hasilPencarian = ReviewEksternalReg::join('kategori_divisi_reviu', 'kategori_divisi_reviu.uuid_review_eksternal_reg', '=', 'review_eksternal_regs.uuid')
            ->join('kategori_divisis', 'kategori_divisis.id', '=', 'kategori_divisi_reviu.kategori_divisi_id')
            ->where(function ($query) use ($searchKeyword) {
                $query->where('review_eksternal_regs.tentang', 'like', '%' . $searchKeyword . '%')
                    ->orWhere('review_eksternal_regs.nomor_peraturan', 'like', '%' . $searchKeyword . '%')
                    ->orWhere('review_eksternal_regs.tanggal_penetapan', 'like', '%' . $searchKeyword . '%');
            })
            ->where(function ($query) use ($selectOptionValueJenis) {
                $query->where('kategori_divisis.id', '=', $selectOptionValueJenis)
                    ->where('review_eksternal_regs.jenis_peraturan_eksternal_id', '=', $selectOptionValueJenis);
            })
            ->select('review_eksternal_regs.*')
            ->paginate(5);

        return view('reviewEksternalReg.index', [
            'title' => 'Reviu Peraturan Eksternal',
            'link' => 'reviu_peraturan_eksternal',
            'reg_list' => $hasilPencarian,
            'jenis' => JenisPeraturanEksternal::get(),
            'kategori' => KategoriDivisi::get(),
            'selectOptionValue' => $selectOptionValue,
            'selectOptionValueJenis' => $selectOptionValueJenis,
            'searchKeyword' => $searchKeyword
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
    public function show($id)
    {
        $data = ReviewEksternalReg::find($id);
        return view('reviewEksternalReg.show', [
            'title' => 'Reviu Peraturan Eksternal',
            'active' => 'reviu_peraturan_eksternal',
            'link' => 'reviu_peraturan_eksternal',
            'regulation' => ReviewEksternalReg::find($id),
            'divisi' => KategoriDivisiReviu::where('uuid_review_eksternal_reg', '=', $data['uuid'])->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReviewEksternalReg $reviewEksternalReg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReviewEksternalReg $reviewEksternalReg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReviewEksternalReg $reviewEksternalReg)
    {
        //
    }
}
