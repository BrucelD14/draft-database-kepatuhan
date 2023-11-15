<?php

namespace App\Http\Controllers;

use App\Models\Review_internalreg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardReview_internalRegController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regulations = Review_internalreg::latest()->paginate(10)->onEachSide(2);

        return view('dashboard.reviewInternal.index', [
            'title' => 'Reviu Peraturan Internal',
            'link' => 'reviu_peraturan_internal',
            'regulations' => $regulations,
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
    public function edit($id)
    {
        return view('dashboard.reviewInternal.edit', [
            'title' => 'Edit Reviu Peraturan Internal',
            'link' => 'reviu_peraturan_internal',
            'regulation' => Review_internalreg::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $regulation = Review_internalreg::find($id);

        $rules = [
            'kppp' => 'required|max:255',
            'kpde' => 'required|max:255',
            'tentang_peraturan' => 'required',
            'keterangan_status' => 'required',
            'dokumen' => 'required|file',
        ];

        $request->validate($rules);

        if ($request->hasFile('dokumen')) {
            $regulation->kppp = $request->kppp;
            $regulation->kpde = $request->kpde;
            $regulation->tentang_peraturan = $request->tentang_peraturan;
            $regulation->keterangan_status = $request->keterangan_status;
            $regulation->dokumen = $request->file('dokumen')->store('review-documents', 'public');
            $regulation->save();
        } else {
            $regulation->kppp = $request->kppp;
            $regulation->kpde = $request->kpde;
            $regulation->tentang_peraturan = $request->tentang_peraturan;
            $regulation->keterangan_status = $request->keterangan_status;
            $regulation->save();
        }

        return redirect('/dashboard/reviu_peraturan_internal')->with('success', 'Reviu peraturan telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $regulation = Review_internalreg::find($id);
        if ($regulation->dokumen) {
            Storage::delete($regulation->dokumen);
        }
        Review_internalreg::destroy($id);
        return redirect('/dashboard/reviu_peraturan_internal')->with('success', 'Reviu telah dihapus');
    }
}
