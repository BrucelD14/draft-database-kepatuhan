<?php

namespace App\Http\Controllers;

use App\Models\KategoriDivisiReviu;
use App\Models\ReviewEksternalReg;
use Illuminate\Http\Request;
use App\Models\CatatanReviu;


class DashboardDraftReviewEksternalRegController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.DraftReviewExternal.index', [
            'title' => 'Reviu Peraturan Eksternal',
            'link' => 'draft_reviu',
            'regulations' => ReviewEksternalReg::where('status_publish', 0)->get(),

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
        return view('dashboard.DraftReviewExternal.show', [
            'title' => 'Detail Reviu Peraturan Eksternal',
            'link' => 'draft_reviu',
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

    public function approve($id)
    {
        $reviu = ReviewEksternalReg::find($id);
        $reviu->status_publish = 1;
        $reviu->save();

        return redirect('/dashboard/approved_reviu')->with('success', 'Reviu telah disetujui');
    }

    public function addNote(Request $request, $id)
    {
        $reviu = ReviewEksternalReg::find($id);

        $validatedData = $request->validate([
            'pesan_catatan' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['reviu_peraturan_eksternal_id'] = $reviu->id;

        // dd($validatedData);

        CatatanReviu::create($validatedData);
        return redirect("/dashboard/draft_reviu/$reviu->id")->with('success', 'Catatan berhasil ditambahkan');
    }
}
