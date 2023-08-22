<?php

use App\Http\Controllers\{
    CidadeController,
    ClienteController,
    EstadoController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('cliente')->group(function () {
    Route::post('/cadastro', [ClienteController::class, 'create']);
    Route::get('/listar', [ClienteController::class, 'list']);
    Route::get('/editar/{id}', [ClienteController::class, 'edit']);
    Route::get('/visualizar/{id}', [ClienteController::class, 'show']);
    Route::get('/buscar', [ClienteController::class, 'search']);
    Route::put('/atualizar/{id}', [ClienteController::class, 'update']);
    Route::delete('/deletar/{id}', [ClienteController::class, 'destroy']);
});

Route::prefix('estado')->group(function () {
    Route::get('/select', [EstadoController::class, 'select']);
});

Route::prefix('cidade')->group(function () {
    Route::get('/select/{codigo_uf}', [CidadeController::class, 'selectPorEstado']);
});
