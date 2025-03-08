<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CholloController;

// Página principal: Listado de chollos
Route::get('/', [CholloController::class, 'index'])->name('home');

// Ruta para mostrar el formulario de creación de un chollo
Route::get('/chollos/create', [CholloController::class, 'create'])->name('chollos.create');

// Grupo de rutas para los chollos (CRUD completo)
Route::resource('chollos', CholloController::class);

Route::put('/chollos/{chollo}', [CholloController::class, 'update'])->name('chollos.update');

Route::get('/destacados', [CholloController::class, 'destacados'])->name('chollos.destacados');
