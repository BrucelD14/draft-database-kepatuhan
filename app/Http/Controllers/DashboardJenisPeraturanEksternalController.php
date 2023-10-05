<?php

namespace App\Http\Controllers;

use App\Models\JenisPeraturanEksternal;
use Illuminate\Http\Request;

class DashboardJenisPeraturanEksternalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.jenisPeraturanEksternal.index', [
            'title' => 'Jenis Peraturan Eksternal',
            'link' => 'jenis_peraturan_eksternal',
            'jenisPeraturan' => JenisPeraturanEksternal::all(),
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
    public function show(JenisPeraturanEksternal $jenisPeraturanEksternal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPeraturanEksternal $jenisPeraturanEksternal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisPeraturanEksternal $jenisPeraturanEksternal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPeraturanEksternal $jenisPeraturanEksternal)
    {
        //
    }
}
