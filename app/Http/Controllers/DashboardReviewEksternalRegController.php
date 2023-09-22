<?php

namespace App\Http\Controllers;

use App\Models\ReviewEksternalReg;
use Illuminate\Http\Request;

class DashboardReviewEksternalRegController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.reviewExternal.index', [
            'title' => 'Reviu Peraturan Eksternal',
            'link' => 'reviu_peraturan_eksternal',
            'regulations' => ReviewEksternalReg::all(),
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
    public function show(ReviewEksternalReg $reviewEksternalReg)
    {
        //
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
