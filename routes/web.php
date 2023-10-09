<?php

use App\Http\Controllers\DashboardExternal_regulationController;
use App\Http\Controllers\DashboardInternal_regulationController;
use App\Http\Controllers\DashboardJenisPeraturanEksternalController;
use App\Http\Controllers\DashboardJenisPeraturanInternalController;
use App\Http\Controllers\DashboardJenisPeraturanMenteriController;
use App\Http\Controllers\DashboardKategoriDivisiController;
use App\Http\Controllers\DashboardMinisterial_regulationController;
use App\Http\Controllers\DashboardReview_internalRegController;
use App\Http\Controllers\DashboardReviewEksternalRegController;
use App\Http\Controllers\External_regulationController;
use App\Http\Controllers\Internal_regulationController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MatrixController;
use App\Http\Controllers\MatrixExternalRegulationController;
use App\Http\Controllers\MatrixInternalRegulationController;
use App\Http\Controllers\Ministerial_regulationController;
use App\Http\Controllers\Product_lawController;
use App\Http\Controllers\ReviewEksternalRegController;
use App\Http\Controllers\ReviewInternalregController;
use App\Models\ReviewEksternalReg;
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
Route::get('/peraturan_internal_perusahaan', [Internal_regulationController::class, 'index'])->middleware('auth');
Route::get('/peraturan_eksternal', [External_regulationController::class, 'index'])->middleware('auth');
Route::get('/peraturan_menteri_bumn', [Ministerial_regulationController::class, 'index'])->middleware('auth');
Route::get('/reviu_peraturan_internal', [ReviewInternalregController::class, 'index'])->middleware('auth');
Route::get('/reviu_peraturan_eksternal', [ReviewEksternalRegController::class, 'index'])->middleware('auth');
Route::get('/matriks', [MatrixController::class, 'index'])->middleware('auth');
Route::get('/matriks/peraturan_internal', [MatrixInternalRegulationController::class, 'index'])->middleware('auth');
Route::get('/matriks/peraturan_eksternal', [MatrixExternalRegulationController::class, 'index'])->middleware('auth');

Route::get('/dashboard', function () {
  return view('dashboard.index', [
    'title' => 'Dashboard'
  ]);
})->middleware('auth');

// Route::get('dashboard/peraturan_internal/checkSlug', [DashboardInternal_regulationController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/peraturan_internal', DashboardInternal_regulationController::class)->middleware('auth');
Route::resource('/dashboard/peraturan_eksternal', DashboardExternal_regulationController::class)->middleware('auth');
Route::resource('/dashboard/peraturan_menteri_bumn', DashboardMinisterial_regulationController::class)->middleware('auth');
Route::resource('/dashboard/reviu_peraturan_internal', DashboardReview_internalRegController::class)->middleware('auth');
Route::resource('/dashboard/reviu_peraturan_eksternal', DashboardReviewEksternalRegController::class)->middleware('auth');
Route::resource('/dashboard/jenis_peraturan_internal', DashboardJenisPeraturanInternalController::class)->middleware('auth');
Route::resource('/dashboard/jenis_peraturan_eksternal', DashboardJenisPeraturanEksternalController::class)->middleware('auth');
Route::resource('/dashboard/jenis_peraturan_menteri', DashboardJenisPeraturanMenteriController::class)->middleware('auth');
Route::resource('/dashboard/kategori_divisi', DashboardKategoriDivisiController::class)->middleware('auth');

Route::get('/tambah', function () {
  $reviu = ReviewEksternalReg::find(1);
  $divisi = ['1'];
  $reviu->kategoriDivisi()->attach($divisi);
  return "Sukses tambah data";
});
