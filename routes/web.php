<?php

use App\Http\Controllers\achatController;
use App\Http\Controllers\agentController;
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
    Route::get('/agent/profil',[profilController::class,'index'])->name('profil.index');
});
Route::middleware(['auth','isAdmin'])->group(function () {
    Route::resource('agents', agentController::class);
    Route::put('/agents/activer/{agents}',[agentController::class,'activer'])->name('agents.activer');
    Route::put('/agents/désactiver/{agents}',[agentController::class,'desactiver'])->name('agents.désactiver');

});

Route::get('redirects','App\Http\Controllers\roleController@index')->name('redirect');
Route::fallback(function() {
    return view('404');
});
require __DIR__.'/auth.php';
    Route::get('/agent/profil',[profilController::class,'index'])->name('profil.index');
