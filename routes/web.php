<?php

use App\Http\Controllers\DashboardInternal_regulationController;
use App\Http\Controllers\External_regulationController;
use App\Http\Controllers\Internal_regulationController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Ministerial_regulationController;
use App\Http\Controllers\Product_lawController;
use App\Http\Controllers\ReviewInternalregController;
use App\Models\Internal_regulation;
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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/landing', [LandingController::class, 'index'])->middleware('auth');
Route::get('/produk_hukum', [Product_lawController::class, 'index'])->middleware('auth');
Route::get('/produk_hukum/peraturan_internal_perusahaan', [Internal_regulationController::class, 'index'])->middleware('auth');
Route::get('/produk_hukum/peraturan_eksternal', [External_regulationController::class, 'index'])->middleware('auth');
Route::get('/produk_hukum/peraturan_menteri_bumn', [Ministerial_regulationController::class, 'index'])->middleware('auth');
Route::get('/produk_hukum/reviu_peraturan_internal', [ReviewInternalregController::class, 'index'])->middleware('auth');

Route::get('/dashboard', function () {
  return view('dashboard.index', [
    'title' => 'Dashboard'
  ]);
})->middleware('auth');

// Route::get('/dashboard/peraturan_internal/checkSlug', [DashboardInternal_regulationController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/peraturan_internal', DashboardInternal_regulationController::class)->middleware('auth');
