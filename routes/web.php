<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuangMultimediaController;
use App\Http\Controllers\RuangDiskusiController;
use App\Http\Controllers\RuangAulaController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\PinjamRuangController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\LaporanController;

use App\Models\Ruang;


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
    $Ruangs = Ruang::all();
    return view('welcome',compact('Ruangs'));
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('ruang_multimedia', RuangMultimediaController::class);

// Route::resource('ruang_diskusi', RuangDiskusiController::class);

// Route::resource('ruang_aula', RuangAulaController::class);

Route::resource('ruang', RuangController::class);

Route::resource('PinjamRuang', PinjamRuangController::class);

Route::resource('laporan', LaporanController::class);

Route::resource('akun', AkunController::class);
Route::get('test', function(){
return view('layouts.master');
});


