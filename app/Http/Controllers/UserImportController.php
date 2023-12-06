<?php

namespace App\Http\Controllers;

use App\Imports\UserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserImportController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'importir_user' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new UserImport, $request->file('importir_user')->store('importir'));

        return redirect('/dashboard/importir')->with('success', 'Berhasil Import Users');
    }
}
