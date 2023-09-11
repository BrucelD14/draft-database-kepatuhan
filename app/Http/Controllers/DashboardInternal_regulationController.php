<?php

namespace App\Http\Controllers;

use App\Models\Internal_regulation;
use Illuminate\Http\Request;

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
    public function show(Internal_regulation $internal_regulation)
    {
        return $internal_regulation;
        return view('dashboard.internalReg.show', [
            'title' => 'Detail Peraturan',
            'internalReg' => $internal_regulation
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
}
