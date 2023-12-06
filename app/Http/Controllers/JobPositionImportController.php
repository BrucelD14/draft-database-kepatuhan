<?php

namespace App\Http\Controllers;

use App\Imports\JobPositionImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JobPositionImportController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'importir_job_position' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new JobPositionImport, $request->file('importir_job_position')->store('importir'));

        return redirect('/dashboard/importir')->with('success', 'Berhasil Import Job Positions');
    }
}
