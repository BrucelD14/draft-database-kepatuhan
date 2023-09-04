<?php

use App\Http\Controllers\External_regulationController;
use App\Http\Controllers\Internal_regulationController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Product_lawController;
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

Route::get('/produk_hukum/peraturan_internal_perusahaan', [Internal_regulationController::class, 'index']);

Route::get('/produk_hukum/peraturan_internal_perusahaan', [Internal_regulationController::class, 'index']);

Route::get('/produk_hukum/peraturan_eksternal', [External_regulationController::class, 'index']);
