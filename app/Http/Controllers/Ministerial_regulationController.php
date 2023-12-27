<?php

namespace App\Http\Controllers;

use App\Models\JenisPeraturanMenteri;
use App\Models\Ministerial_regulation;
use Illuminate\Http\Request;

class Ministerial_regulationController extends Controller
{
    public function index(Request $request)
    {
        $searchKeyword = $request->input('search');
        $selectOptionValueJenis = $request->input('selectedJenis');
        $hasilPencarian = Ministerial_regulation::join('jenis_peraturan_menteris', 'jenis_peraturan_menteris.id', '=', 'ministerial_regulations.jenis_peraturan_menteri_id')
            ->select('ministerial_regulations.id', 'ministerial_regulations.nomor_peraturan', 'ministerial_regulations.tanggal_penetapan', 'ministerial_regulations.tentang', 'ministerial_regulations.status', 'ministerial_regulations.dokumen', 'jenis_peraturan_menteris.id as jenis_id', 'jenis_peraturan_menteris.nama as jenis_nama')
            ->when($searchKeyword, function ($query) use ($searchKeyword) {
                $query->where(function ($innerQuery) use ($searchKeyword) {
                    $innerQuery->where('ministerial_regulations.tentang', 'like', '%' . $searchKeyword . '%')
                        ->orWhere('ministerial_regulations.nomor_peraturan', 'like', '%' . $searchKeyword . '%')
                        ->orWhere('ministerial_regulations.keterangan_status', 'like', '%' . $searchKeyword . '%')
                        ->orWhere('ministerial_regulations.tanggal_penetapan', 'like', '%' . $searchKeyword . '%');
                });
            })
            ->when($selectOptionValueJenis, function ($query) use ($selectOptionValueJenis) {
                $query->where('jenis_peraturan_menteris.id', '=', $selectOptionValueJenis);
            })
            ->orderBy('tanggal_penetapan', 'desc')
            ->paginate(5);

        return view('ministerialRegulation.index', [
            'title' => 'Peraturan Menteri BUMN',
            'active' => 'peraturan_menteri_bumn',
            'searchKeyword' => $searchKeyword,
            'jenis' => JenisPeraturanMenteri::get(),
            'selectOptionValueJenis' => $selectOptionValueJenis,
            'reg_list' => $hasilPencarian,
        ]);
    }

    public function show($id)
    {
        $data = Ministerial_regulation::find($id);
        return view('ministerialRegulation.show', [
            'title' => 'Peraturan Menteri BUMN',
            'active' => 'peraturan_menteri_bumn',
            'link' => 'peraturan_menteri_bumn',
            'regulation' => $data,
        ]);
    }
}
