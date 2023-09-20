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
        return view('dashboard.reviewInternal.create', [
            'title' => 'Tambah Reviu Peraturan Internal',
            'link' => 'reviu_peraturan_internal',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kppp' => 'required|max:255',
            'kpde' => 'required|max:255',
            'tentang_peraturan' => 'required',
            'keterangan_status' => 'required',
            'dokumen' => 'required|file',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['dokumen'] = $request->file('dokumen')->store('review-documents', 'public');

        Review_internalreg::create($validatedData);
        return redirect('/dashboard/reviu_peraturan_internal')->with('success', 'Reviu peraturan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('dashboard.reviewInternal.show', [
            'title' => 'Detail Reviu Peraturan Internal',
            'link' => 'reviu_peraturan_internal',
            'regulation' => Review_internalreg::find($id)
        ]);
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
