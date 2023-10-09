<?php

namespace App\Http\Controllers;

use App\Models\JenisPeraturanMenteri;
use Illuminate\Http\Request;

class DashboardJenisPeraturanMenteriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.jenisPeraturanMenteri.index', [
            'title' => 'Jenis Peraturan Menteri',
            'link' => 'jenis_peraturan_menteri',
            'jenisPeraturan' => JenisPeraturanMenteri::all()
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
    public function show(JenisPeraturanMenteri $jenisPeraturanMenteri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPeraturanMenteri $jenisPeraturanMenteri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisPeraturanMenteri $jenisPeraturanMenteri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPeraturanMenteri $jenisPeraturanMenteri)
    {
        //
    }
}
