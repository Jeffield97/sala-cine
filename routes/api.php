<?php

use App\Http\Controllers\API\PeliculaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */
use App\Http\Controllers\API\SalaCineController;

// Route::apiResource('peliculas', ClienteController::class);
// Route::apiResource('sala', ClienteController::class);
use Illuminate\Http\Request;

Route::get('/peliculas', [PeliculaController::class, 'index']);
Route::get('/peliculas/{id}', [PeliculaController::class, 'show']);
Route::post('/peliculas', [PeliculaController::class, 'store']);
Route::put('/peliculas/{id}', [PeliculaController::class, 'update']);
Route::delete('/peliculas/{id}', [PeliculaController::class, 'destroy']);
Route::post('/peliculas/search', [PeliculaController::class, 'search']);
Route::post('/peliculas/count-by-publication-date', [PeliculaController::class, 'countByPublicationDate']);
Route::post('/salas-cine/check-capacity', [SalaCineController::class, 'searchAndCheckCapacity']);

use Illuminate\Support\Facades\Route;

Route::get('/salas-cine', [SalaCineController::class, 'index']);
Route::get('/salas-cine/{id}', [SalaCineController::class, 'show']);
Route::post('/salas-cine', [SalaCineController::class, 'store']);
Route::put('/salas-cine/{id}', [SalaCineController::class, 'update']);
Route::delete('/salas-cine/{id}', [SalaCineController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
