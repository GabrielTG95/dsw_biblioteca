<?php

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
    return view('inicio');
});

Route::resource('/ejemplares',\App\Http\Controllers\EjemplarController::class);
Route::resource('/libros',\App\Http\Controllers\LibroController::class);
Route::resource('/prestamos',\App\Http\Controllers\PrestamoController::class);
Route::resource('/usuarios',\App\Http\Controllers\UsuarioController::class);
