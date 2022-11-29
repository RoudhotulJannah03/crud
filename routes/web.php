<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MahasiswaController;
use App\Models\Post;
use App\Models\Mahasiswa;
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
    return view('input-mahasiswa');
});
Route::post('store-form', [PostController::class, 'store']);
Route::get('/read',[PostController::class,'read']);
Route::get('/edit/{id}', [PostController::class, 'edit']);
Route::get('/delete/{id}', [PostController::class, 'destroy']);
Route::put('/update/{id}', [PostController::class, 'update']);

Route::get('input-mahasiswa', [MahasiswaController::class,'index']);
Route::post('kirim-mahasiswa', [MahasiswaController::class, 'store']);
Route::get('delete-mahasiswa/{nim}',[MahasiswaController::class,'delete']);
Route::get('edit-mahasiswa/{nim}',[MahasiswaController::class,'edit']);
Route::get('show-data-mahasiswa',[MahasiswaController::class,'show']);
Route::post('update-mahasiswa/{nim}',[MahasiswaController::class,'update']);
