<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EditBarangController;
use App\Http\Controllers\PeminjamanController;

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

Route::get('/', function(){
    return view('home', [
        'title' => 'Home'
    ]);
})->middleware('auth');

Route::get('/home', function(){
    return view('home', [
        'title' => 'Home'
    ]);
})->middleware('auth');

Route::get('/barang', [BarangController::class, 'index']);
    
Route::get('/peminjaman', [PeminjamanController::class, 'index']);

Route::get('/laporan', [LaporanController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/barang', BarangController::class)->middleware('auth');

Route::resource('/editbarang', EditBarangController::class)->middleware('auth');

Route::get('/editbarang', function(){
    return view('editbarang', [
        'title' => 'Edit Barang'
    ]);
})->middleware('auth');

