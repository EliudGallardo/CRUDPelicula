<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\AuthController;

// Rutas protegidas (solo accesibles si el usuario ha iniciado sesión)
Route::middleware(['auth', 'no_cache'])->group(function () {
    Route::get('/', [CatalogoController::class, 'inicio'])->name('inicio');
    Route::get('/inicio', [CatalogoController::class, 'inicio'])->name('inicio');
    Route::get('/lista', [CatalogoController::class, 'listado_peliculas'])->name('listado_peliculas');
    Route::get('/agregar', [CatalogoController::class, 'agregar'])->name('agregar');
    Route::get('/editar/{id}', [CatalogoController::class, 'editar'])->name('catalogo.edit');
    Route::put('/edicion/{pelicula}', [CatalogoController::class, 'actualizar'])->name('actualizar');
    Route::post('/insertar', [CatalogoController::class, 'insertar_pelicula'])->name('insertar');
    Route::delete('/eliminar/{id}', [CatalogoController::class, 'eliminar_pelicula'])->name('catalogo.destroy');

    // Cerrar sesión
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Rutas de login y registro solo accesibles si NO ha iniciado sesión
Route::middleware('guest')->group(function () {
    Route::get('/registro', [RegistroController::class, 'create'])->name('registro');
    Route::post('/registro', [RegistroController::class, 'store'])->name('registrar_usuario');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login_usuario');
});