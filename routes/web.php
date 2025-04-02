<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\RevistaController;

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

// Vista principal de artículos
Route::get('/articulo', 'App\Http\Controllers\ArticuloController@index');

// Mostrar formulario de creación
Route::get('/articulo/crear', 'App\Http\Controllers\ArticuloController@create');

// Mostrar formulario de edición
Route::get('/articulo/editar/{id}', 'App\Http\Controllers\ArticuloController@edit');

// Eliminar artículo por ID (muestra la vista de confirmación)
Route::get('/articuloa/{id}', 'App\Http\Controllers\ArticuloController@eliminar');

// Rutas automáticas para guardar, actualizar y eliminar
Route::resource('/articulo', 'App\Http\Controllers\ArticuloController');

Route::resource('/autor','App\Http\Controllers\AutorController');

Route::get('/autor/{id}/eliminar', 'App\Http\Controllers\AutorController@eliminar');

Route::get('/autor/{id}/edit', 'App\Http\Controllers\AutorController@edit');

Route::get('/revistas', [RevistaController::class, 'index'])->name('revistas.index');

Route::get('/revistas/create', [RevistaController::class, 'create'])->name('revistas.create');

Route::post('/revistas', [RevistaController::class, 'store'])->name('revistas.store');

Route::get('/revistas/{revista}/edit', [RevistaController::class, 'edit'])->name('revistas.edit');

Route::put('/revistas/{revista}', [RevistaController::class, 'update'])->name('revistas.update');

Route::delete('/revistas/{revista}', [RevistaController::class, 'destroy'])->name('revistas.destroy');

Route::get('/revistas/{revista}/articulos', [RevistaController::class, 'verArticulos'])->name('revistas.articulos');

Route::get('/revistas/{revista}/articulos', [RevistaController::class, 'verArticulos'])->name('revistas.articulos');
