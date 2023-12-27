<?php

namespace App\Http\Controllers;

use App\Models\External_regulation;
use App\Models\JenisPeraturanEksternal;
use Illuminate\Http\Request;

class External_regulationController extends Controller
{
    public function index(Request $request)
    {
        $searchKeyword = $request->input('search');
        $selectOptionValueJenis = $request->input('selectedJenis');
        $hasilPencarian = External_regulation::join('jenis_peraturan_eksternals', 'jenis_peraturan_eksternals.id', '=', 'external_regulations.jenis_peraturan_eksternal_id')
            ->select('external_regulations.id', 'external_regulations.nomor_peraturan', 'external_regulations.tanggal_penetapan', 'external_regulations.tentang', 'external_regulations.status', 'external_regulations.dokumen', 'jenis_peraturan_eksternals.id as jenis_id', 'jenis_peraturan_eksternals.nama as jenis_nama')
            ->when($searchKeyword, function ($query) use ($searchKeyword) {
                $query->where(function ($innerQuery) use ($searchKeyword) {
                    $innerQuery->where('external_regulations.tentang', 'like', '%' . $searchKeyword . '%')
                        ->orWhere('external_regulations.nomor_peraturan', 'like', '%' . $searchKeyword . '%')
                        ->orWhere('external_regulations.keterangan_status', 'like', '%' . $searchKeyword . '%')
                        ->orWhere('external_regulations.tanggal_penetapan', 'like', '%' . $searchKeyword . '%');
                });
            })
            ->when($selectOptionValueJenis, function ($query) use ($selectOptionValueJenis) {
                $query->where('jenis_peraturan_eksternals.id', '=', $selectOptionValueJenis);
            })
            ->orderBy('tanggal_penetapan', 'desc')
            ->paginate(5);

        return view('externalRegulation.index', [
            'title' => 'Peraturan Eksternal',
            'active' => 'peraturan_eksternal',
            'searchKeyword' => $searchKeyword,
            'jenis' => JenisPeraturanEksternal::get(),
            'selectOptionValueJenis' => $selectOptionValueJenis,
            'reg_list' => $hasilPencarian,
        ]);
    }

    public function show($id)
    {
        $data = External_regulation::find($id);
        return view('externalRegulation.show', [
            'title' => 'Peraturan Eksternal',
            'active' => 'peraturan_eksternal',
            'link' => 'peraturan_eksternal',
            'regulation' => $data,
        ]);
    }
}
