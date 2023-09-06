<?php

namespace App\Http\Controllers;

use App\Models\Internal_regulation;
use Illuminate\Http\Request;

class Internal_regulationController extends Controller
{
    public function index()
    {
        $internal_regulations = Internal_regulation::latest();

        if (request('search')) {
            $internal_regulations->where('tentang', 'like', '%' . request('search') . '%')
                ->orWhere('nomor_peraturan', 'like', '%' . request('search') . '%')
                ->orWhere('jenis_peraturan', 'like', '%' . request('search') . '%');
        }

        return view('regulations', [
            'title' => 'Peraturan Internal',
            // 'reg_list' => Internal_regulation::all(),
            'reg_list' => $internal_regulations->get()
        ]);
    }
}
