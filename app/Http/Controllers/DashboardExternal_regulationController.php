<?php

namespace App\Http\Controllers;

use App\Models\External_regulation;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(External_regulation $external_regulation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(External_regulation $external_regulation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, External_regulation $external_regulation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(External_regulation $external_regulation)
    {
        //
    }
}
