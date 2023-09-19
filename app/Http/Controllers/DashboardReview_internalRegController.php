<?php

namespace App\Http\Controllers;

use App\Models\Review_internalreg;
use Illuminate\Http\Request;

class DashboardReview_internalRegController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.reviewInternal.index', [
            'title' => 'Reviu Peraturan Internal',
            'link' => 'reviu_peraturan_internal',
            'regulations' => Review_internalreg::all(),
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
    public function show(Review_internalreg $review_internalreg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review_internalreg $review_internalreg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review_internalreg $review_internalreg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review_internalreg $review_internalreg)
    {
        //
    }
}
