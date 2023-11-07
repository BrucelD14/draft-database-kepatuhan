<?php

namespace App\Http\Controllers;

use App\Models\KategoriDivisiReviu;
use App\Models\ReviewEksternalReg;
use Illuminate\Http\Request;

class ReviuPeraturanEksternalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reviewEksternalReg.index', [
            'title' => 'Reviu Peraturan Eksternal',
            'link' => 'reviu_peraturan_eksternal',
            'reg_list' => ReviewEksternalReg::where('status_publish', 1)->latest()->filter(request(['search']))->paginate(5)->withQueryString(),
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
