<?php

namespace App\Http\Controllers;

use App\Imports\InternalRegulationImport;
use App\Models\Internal_regulation;
use App\Models\JenisPeraturanEksternal;
use App\Models\JenisPeraturanInternal;
use App\Models\KategoriDivisi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Internal_regulationController extends Controller
{
    public function index(Request $request)
    {
        $searchKeyword = $request->input('search');
        $selectOptionValue = $request->input('selectedCategory');
        $selectOptionValueJenis = $request->input('selectedJenis');
        // $test = DB::table('internal_regulations')->get();
        $hasilPencarian = DB::table('internal_regulations')->join('kategori_divisis', 'kategori_divisis.id', '=', 'internal_regulations.kategori_divisi_id')
            ->join('jenis_peraturan_internals', 'jenis_peraturan_internals.id', '=', 'internal_regulations.jenis_peraturan_internal_id')
            ->select('internal_regulations.id', 'internal_regulations.nomor_peraturan', 'internal_regulations.tanggal_penetapan', 'internal_regulations.tentang', 'internal_regulations.status', 'internal_regulations.dokumen', 'jenis_peraturan_internals.id as jenis_id', 'jenis_peraturan_internals.nama as jenis_nama', 'kategori_divisis.id as kategori_id')
            ->when($searchKeyword, function ($query) use ($searchKeyword) {
                $query->where(function ($innerQuery) use ($searchKeyword) {
                    $innerQuery->where('tentang', 'like', '%' . $searchKeyword . '%')
                        ->orWhere('internal_regulations.nomor_peraturan', 'like', '%' . $searchKeyword . '%')
                        ->orWhere('internal_regulations.keterangan_status', 'like', '%' . $searchKeyword . '%')
                        ->orWhere('internal_regulations.tanggal_penetapan', 'like', '%' . $searchKeyword . '%');
                });
            })
            ->when($selectOptionValue, function ($query) use ($selectOptionValue) {
                $query->where('kategori_divisis.id', '=', $selectOptionValue);
            })
            ->when($selectOptionValueJenis, function ($query) use ($selectOptionValueJenis) {
                $query->where('jenis_peraturan_internals.id', '=', $selectOptionValueJenis);
            })
            ->orderBy('tanggal_penetapan', 'desc')
            ->paginate(5);
        // dd($hasilPencarian);
        //dd($test);
        // return $hasilPencarian;
        return view('regulations', [
            'title' => 'Peraturan Internal',
            'active' => 'peraturan_internal_perusahaan',
            'searchKeyword' => $searchKeyword,
            'jenis' => JenisPeraturanInternal::get(),
            'kategori' => KategoriDivisi::get(),
            'selectOptionValue' => $selectOptionValue,
            'selectOptionValueJenis' => $selectOptionValueJenis,
            'reg_list' => $hasilPencarian
        ]);
    }

    public function show($id)
    {
        $data = Internal_regulation::find($id);
        return view('internalRegulation.show', [
            'title' => 'Peraturan Internal',
            'active' => 'peraturan_internal_perusahaan',
            'link' => 'peraturan_internal_perusahaan',
            'regulation' => $data,
        ]);
    }

    public function import(Request $request)
    {
        $file = $request->file('file')->store('import-peraturan-internal');

        $import = new InternalRegulationImport;
        $import->import($file);

        // // dd($import->failures());
        // if ($import->failures()->isNotEmpty()) {
        //     return back()->withFailures($import->failures());
        // }


        return redirect('/dashboard/peraturan_internal')->with('success', 'Data berhasil di import');
    }
}
