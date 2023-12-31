<?php

use App\Http\Controllers\DashboardApprovedReviewEksternalRegController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDraftReviewEksternalRegController;
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
use App\Http\Controllers\ImportirController;
use App\Http\Controllers\Internal_regulationController;
use App\Http\Controllers\JobPositionImportController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MatrixController;
use App\Http\Controllers\MatrixExternalRegulationController;
use App\Http\Controllers\MatrixInternalRegulationController;
use App\Http\Controllers\Ministerial_regulationController;
use App\Http\Controllers\Product_lawController;
use App\Http\Controllers\ReviewInternalregController;
use App\Http\Controllers\ReviuPeraturanEksternalController;
use App\Http\Controllers\UserImportController;
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

// LOGIN ROUTE
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
// LOGIN ROUTE

// MAIN MENU ROUTE
Route::get('/landing', [LandingController::class, 'index'])->middleware('auth');
Route::get('/produk_hukum', [Product_lawController::class, 'index'])->middleware('auth');
Route::get('/peraturan_internal_perusahaan', [Internal_regulationController::class, 'index'])->middleware('auth');
Route::get('/peraturan_internal_perusahaan/{id}', [Internal_regulationController::class, 'show'])->middleware('auth');
Route::get('/peraturan_eksternal', [External_regulationController::class, 'index'])->middleware('auth');
Route::get('/peraturan_eksternal/{id}', [External_regulationController::class, 'show'])->middleware('auth');
Route::get('/peraturan_menteri_bumn', [Ministerial_regulationController::class, 'index'])->middleware('auth');
Route::get('/peraturan_menteri_bumn/{id}', [Ministerial_regulationController::class, 'show'])->middleware('auth');
Route::get('/reviu_peraturan_internal', [ReviewInternalregController::class, 'index'])->middleware('auth');
Route::get('/reviu_peraturan_internal/{id}', [ReviewInternalregController::class, 'show'])->middleware('auth');
Route::get('/matriks', [MatrixController::class, 'index'])->middleware('auth');
Route::get('/matriks/peraturan_internal', [MatrixInternalRegulationController::class, 'index'])->middleware('auth');
Route::get('/matriks/peraturan_eksternal', [MatrixExternalRegulationController::class, 'index'])->middleware('auth');
Route::get('/reviu_peraturan_eksternal', [ReviuPeraturanEksternalController::class, 'index'])->middleware('auth');
Route::get('/reviu_peraturan_eksternal/{id}', [ReviuPeraturanEksternalController::class, 'show'])->middleware('auth');

// DASHBOARD ROUTE
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('not_reader');
Route::resource('/dashboard/peraturan_internal', DashboardInternal_regulationController::class)->middleware('is_editor');
Route::resource('/dashboard/peraturan_eksternal', DashboardExternal_regulationController::class)->middleware('is_editor');
Route::resource('/dashboard/peraturan_menteri_bumn', DashboardMinisterial_regulationController::class)->middleware('is_editor');
Route::resource('/dashboard/reviu_peraturan_internal', DashboardReview_internalRegController::class)->middleware('is_editor');
Route::resource('/dashboard/reviu_peraturan_eksternal', DashboardReviewEksternalRegController::class)->middleware('is_editor');
Route::resource('/dashboard/jenis_peraturan_internal', DashboardJenisPeraturanInternalController::class)->except('show')->middleware('is_editor');
Route::resource('/dashboard/jenis_peraturan_eksternal', DashboardJenisPeraturanEksternalController::class)->except('show')->middleware('is_editor');
Route::resource('/dashboard/jenis_peraturan_menteri', DashboardJenisPeraturanMenteriController::class)->except('show')->middleware('is_editor');
Route::resource('/dashboard/kategori_divisi', DashboardKategoriDivisiController::class)->except('show')->middleware('is_editor');
Route::resource('/dashboard/approved_reviu', DashboardApprovedReviewEksternalRegController::class)->except('create', 'store', 'edit', 'update', 'destroy')->middleware('not_reader');
Route::resource('/dashboard/draft_reviu', DashboardDraftReviewEksternalRegController::class);
Route::get('/dashboard/draft_reviu/approve/{id}', [DashboardDraftReviewEksternalRegController::class, 'approve'])->middleware('auth');
Route::post('/dashboard/tambah_catatan/{id}', [DashboardDraftReviewEksternalRegController::class, 'addNote']);
Route::post('/dashboard/tambah_catatan_editor/{id}', [DashboardReviewEksternalRegController::class, 'addNote']);

// IMPORT
// Route::post('import_peraturan_internal', [Internal_regulationController::class, 'import'])->name('peraturanInternal.import');
Route::get('dashboard/importir', [ImportirController::class, 'index'])->middleware('auth');
Route::post('/divisi_import', [DashboardKategoriDivisiController::class, 'import'])->name('divisiimport.store');
Route::post('/job_position_import', JobPositionImportController::class)->name('jobpositionimport.store');
Route::post('/user_import', UserImportController::class)->name('userimport.store');
