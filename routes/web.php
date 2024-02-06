<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AccountController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list-petugass', [PetugasController::class, 'index']);
Route::get('/petugass/{id}', [PetugasController::class, 'show']);
Route::post('/list-petugass', [PetugasController::class, 'store']);
Route::put('/petugass/{id}', [PetugasController::class, 'update']);
Route::delete('/petugass/{id}', [PetugasController::class, 'destroy']);
Route::get('/search-petugas', [PetugasController::class, 'search']);

Route::get('/list-anggotas', [AnggotaController::class, 'index']);
Route::get('/anggotas/{id}', [AnggotaController::class, 'show']);
Route::post('/list-anggotas', [AnggotaController::class, 'store']);
Route::put('/anggotas/{id}', [AnggotaController::class, 'update']);
Route::delete('/anggotas/{id}', [AnggotaController::class, 'destroy']);
Route::get('/search-anggota', [AnggotaController::class, 'search']);

Route::get('/list-bukus', [BukuController::class, 'index']);
Route::get('/bukus/{id}', [BukuController::class, 'show']);
Route::post('/list-bukus', [BukuController::class, 'store']);
Route::put('/bukus/{id}', [BukuController::class, 'update']);
Route::delete('/bukus/{id}', [BukuController::class, 'destroy']);
Route::get('/search-buku', [BukuController::class, 'search']);

Route::get('/list-accounts', [AccountController::class, 'index']);
Route::get('/accounts/{id}', [AccountController::class, 'show']);
Route::post('/list-accounts', [AccountController::class, 'store']);
Route::put('/accounts/{id}', [AccountController::class, 'update']);
Route::delete('/accounts/{id}', [AccountController::class, 'destroy']);




