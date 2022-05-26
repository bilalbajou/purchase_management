<?php

use App\Http\Controllers\achatController;
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
});

Route::get('redirects','App\Http\Controllers\roleController@index')->name('redirect');
Route::fallback(function() {
    return view('404');
});
require __DIR__.'/auth.php';
