<?php

use App\Http\Controllers\achatController;
use App\Http\Controllers\achatsAdminController;
use App\Http\Controllers\agentController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\frnAdminController;
use App\Http\Controllers\frnController;
use App\Http\Controllers\profilController;
use App\Models\achat;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redirects', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth','isAgent'])->group(function () {
    Route::resource('achats', achatController::class);
    Route::resource('fournisseurs', frnController::class);
    Route::get('/user/profil',[profilController::class,'index'])->name('profil.index');
    Route::get('/achats/all/export',[achatController::class,'exportPdf'])->name('achats.export');
    Route::get('/fournisseurs/all/export',[frnController::class,'exportPdf'])->name('frns.export');

});
Route::middleware(['auth','isAdmin'])->group(function () {
    Route::resource('agents', agentController::class);
    Route::put('/agents/activer/{agents}',[agentController::class,'activer'])->name('agents.activer');
    Route::put('/agents/désactiver/{agents}',[agentController::class,'desactiver'])->name('agents.désactiver');
    Route::get('/Liste_des_achats',[achatsAdminController::class,'index'])->name('achatsAdmin.index');
    Route::get('/Liste_des_fournisseurs',[frnAdminController::class,'index'])->name('frnAdmin.index');
    Route::get('/user/profil',[profilController::class,'index'])->name('profil.index');
    Route::put('/user/profil/update',[profilController::class,'update'])->name('profil.update');
    Route::put('/user/profil/password',[profilController::class,'update_pass'])->name('pass.update');

});

Route::get('redirects','App\Http\Controllers\roleController@index')->name('redirect');
Route::fallback(function() {
    return view('404');
});
require __DIR__.'/auth.php';

Route::middleware(['auth','isAdmin','isAgent'])->group(function(){

});
