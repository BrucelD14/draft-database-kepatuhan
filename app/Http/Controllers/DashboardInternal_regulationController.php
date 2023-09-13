<?php

namespace App\Http\Controllers;

use App\Models\Internal_regulation;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Redirect;

class DashboardInternal_regulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.internalReg.index', [
            'title' => 'Peraturan Internal',
            'regulations' => Internal_regulation::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.internalReg.create', [
            'title' => 'Tambah Peraturan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'nomor_peraturan' => 'required|max:255',
            'tanggal_penetapan' => 'required',
            'slug' => 'required|unique:internal_regulations|max:255',
            'tentang' => 'required',
            'jenis_peraturan' => 'required',
            'status' => 'required',
        ]);

        $validatedData['keterangan_status'] = $request['keterangan_status'];

        Internal_regulation::create($validatedData);

        return redirect('/dashboard/peraturan_internal')->with('success', 'Peraturan baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // return Internal_regulation::find($id);
        return view('dashboard.internalReg.show', [
            'title' => 'Detail Peraturan',
            'internalReg' => Internal_regulation::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Internal_regulation $internal_regulation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Internal_regulation $internal_regulation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Internal_regulation $internal_regulation)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Internal_regulation::class, 'slug', $request->nomor_peraturan);
        return response()->json(['slug' => $slug]);
    }
}
