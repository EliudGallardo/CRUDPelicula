<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogoController;


Route::get('/', [CatalogoController::class, 'index']);
Route::get('/catalogo/crear', [CatalogoController::class, 'create']);
Route::post('/catalogo', [CatalogoController::class, 'store']);

Route::get('/catalogo/{id}/editar', [CatalogoController::class, 'edit']);
Route::put('/catalogo/{id}', [CatalogoController::class, 'update']);
Route::delete('/catalogo/{id}', [CatalogoController::class, 'destroy']);



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

Route::get('/', [CatalogoController::class, 'index']);
