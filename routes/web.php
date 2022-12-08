<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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


Route::get('input-mahasiswa', [MahasiswaController::class,'index'])->name('index')->middleware('auth');
Route::post('kirim-mahasiswa', [MahasiswaController::class, 'store'])->name('store')->middleware('auth');
Route::get('delete-mahasiswa/{nim}',[MahasiswaController::class,'delete'])->name('delete')->middleware('auth');
Route::get('edit-mahasiswa/{nim}',[MahasiswaController::class,'edit'])->name('edit')->middleware('auth');
Route::get('show-data-mahasiswa',[MahasiswaController::class,'show'])->name('show')->middleware('auth');
Route::post('update-mahasiswa/{nim}',[MahasiswaController::class,'update'])->name('update')->middleware('auth');

Route::get('/index',[MahasiswaController::class,'input-mahasiswa'])->name('input-mahasiswa')->middleware('auth');
Route::get('store-mahasiswa',[MahasiswaController::class,'store'])->middleware('auth');
Route::get('/show',[MahasiswaController::class,'show'])->name('show')->middleware('auth');
Route::get('/delete',[MahasiswaController::class,'delete'])->name('delete')->middleware('auth');
Route::get('/update',[MahasiswaController::class,'edit'])->name('update')->middleware('auth');



Route::get('/laravel',function () {
    return view('welcome');
});

Route::get('/', [AuthenticatedSessionController::class, 'create'])
->name('login');


Route::get('add-blog-post-form', [PostController::class, 'index']);
Route::post('store-form', [PostController::class, 'store']);




Route::get('/coba',function(Request $req) {
    echo "<h1> Ini adalah halaman coba </h1>";
    echo "<hr /> <pre>";
    echo "Authentikasi user anda adalah : "; 
    // $user = Auth::user() ;
    $user=$req->user() ;
    print_r($user) ;

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';