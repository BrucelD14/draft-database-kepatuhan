<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing', function () {
    return view('landing', [
        'title' => 'Landing Page'
    ]);
});

Route::get('/produk_hukum', function () {
    return view('produk', [
        'title' => 'Produk Hukum'
    ]);
});

Route::get('/peraturan_internal_perusahaan', function () {
    return view('perinternal', [
        'title' => 'Peraturan Internal'
    ]);
});
