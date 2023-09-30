<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\RakBukuController;

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
    return view('dashboard');
})->middleware(['auth:admin', 'auth'])->name('dashboard'); 

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('auth.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('auth.register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('auth.register');

Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginAdminController::class, 'index'])->middleware('guest')->name('admin.login');
    Route::post('/login', [LoginAdminController::class, 'authenticate'])->middleware('guest')->name('admin.login');
    Route::post('/logout', [LoginAdminController::class, 'logout'])->middleware('guest')->name('admin.logout');
    
    Route::get('/register', [RegisterAdminController::class, 'index'])->middleware('guest')->name('admin.register');
    Route::post('/register', [RegisterAdminController::class, 'register'])->middleware('guest')->name('admin.register');

    // buku
    Route::get('/list-buku', [BukuController::class, 'index'])->middleware('auth:admin')->name('admin.list-buku');
    Route::post('/list-buku', [BukuController::class, 'create'])->middleware('auth:admin')->name('admin.list-buku');
    
    Route::get('/edit-buku/{id}', [BukuController::class, 'findById'])->middleware('auth:admin')->name('admin.edit-buku');
    Route::put('/edit-buku/{id}', [BukuController::class, 'update'])->middleware('auth:admin')->name('admin.edit-buku');
    Route::delete('/edit-buku/{id}', [BukuController::class, 'delete'])->middleware('auth:admin')->name('admin.edit-buku');

    // rak buku
    Route::get('/rak-buku', [RakBukuController::class, 'index'])->middleware('auth:admin')->name('admin.rak-buku');
    Route::post('/rak-buku', [RakBukuController::class, 'create'])->middleware('auth:admin')->name('admin.rak-buku');
    
    Route::get('/rak-buku/{id}', [RakBukuController::class, 'findById'])->middleware('auth:admin')->name('admin.edit-rak-buku');
    Route::put('/rak-buku/{id}', [RakBukuController::class, 'update'])->middleware('auth:admin')->name('admin.edit-rak-buku');

});