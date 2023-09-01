<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\Peraturan_internalController;
use App\Http\Controllers\Product_lawController;
use App\Models\Peraturan_internal;
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

Route::get('/landing', [LandingController::class, 'index']);

Route::get('/produk_hukum', [Product_lawController::class, 'index']);

Route::get('/produk_hukum/peraturan_internal_perusahaan', [Peraturan_internalController::class, 'index']);
