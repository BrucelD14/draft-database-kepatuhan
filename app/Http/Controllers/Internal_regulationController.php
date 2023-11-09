<?php

namespace App\Http\Controllers;

use App\Imports\InternalRegulationImport;
use App\Models\Internal_regulation;
use App\Models\User;
use Illuminate\Http\Request;

class Internal_regulationController extends Controller
{
    public function index()
    {
        // $user = User::find($id);

        return view('regulations', [
            'title' => 'Peraturan Internal',
            'active' => 'peraturan_internal_perusahaan',
            'reg_list' => Internal_regulation::latest()->filter(request(['search']))->paginate(5)->withQueryString(),
        ]);

        // if ($user->role !== 'editor' || 'reviewer') {
        //     return view('regulations', [
        //         'title' => 'Peraturan Internal',
        //         'active' => 'peraturan_internal_perusahaan',
        //         'reg_list' => Internal_regulation::where('visibility', 'public')->latest()->filter(request(['search']))->paginate(5)->withQueryString(),
        //     ]);
        // } else {
        //     return view('regulations', [
        //         'title' => 'Peraturan Internal',
        //         'active' => 'peraturan_internal_perusahaan',
        //         'reg_list' => Internal_regulation::latest()->filter(request(['search']))->paginate(5)->withQueryString(),
        //     ]);
        // }
    }

    public function import(Request $request)
    {
        $file = $request->file('file')->store('import-peraturan-internal');

        $import = new InternalRegulationImport;
        $import->import($file);

        // // dd($import->failures());
        // if ($import->failures()->isNotEmpty()) {
        //     return back()->withFailures($import->failures());
        // }


        return redirect('/dashboard/peraturan_internal')->with('success', 'Data berhasil di import');
    }
}
