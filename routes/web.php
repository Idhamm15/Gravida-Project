<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\LandingPageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingPageController::class, 'index']);
Route::get('/artikel', [LandingPageController::class, 'artikel']);
Route::get('/artikel/{id}', [LandingPageController::class, 'show_artikel'])->name('artikel.show');
Route::get('/tools/hitung-hpl', [LandingPageController::class, 'hitungHPL']);
Route::get('/about', [LandingPageController::class, 'about']);
Route::get('/contact', [LandingPageController::class, 'contact']);



Auth::routes();

// Editor Route
Route::middleware(['auth','user-role:ADMIN|SUPER ADMIN',])->group(function()
{
    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/admin/artikel/kelola-artikel', [ArtikelController::class, 'admin_artikel']);
    Route::post('/admin/artikel/store', [ArtikelController::class, 'admin_artikel_store']) -> name('artikel.store');
    Route::put('/artikel/{id}', [ArtikelController::class, 'admin_artikel_update'])->name('artikel.update');
    Route::delete('/artikel/{id}', [ArtikelController::class, 'admin_artikel_delete'])->name('artikel.delete');
});




