<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProprietarioController;
use App\Http\Controllers\Api\ImovelController;


// Rotas para Proprietários
Route::prefix('proprietarios')->group(function () {
    Route::get('/', [ProprietarioController::class, 'index']); // Listar todos
    Route::post('/', [ProprietarioController::class, 'store']); // Criar novo
    Route::get('/{id}', [ProprietarioController::class, 'show']); // Mostrar específico
    Route::put('/{id}', [ProprietarioController::class, 'update']); // Atualizar
    Route::delete('/{id}', [ProprietarioController::class, 'destroy']); // Remover
});

// Rotas para Imóveis
Route::prefix('imoveis')->group(function () {
    Route::get('/', [ImovelController::class, 'index']); // Listar todos (com filtros)
    Route::post('/', [ImovelController::class, 'store']); // Criar novo
    Route::get('/{id}', [ImovelController::class, 'show']); // Mostrar específico
    Route::put('/{id}', [ImovelController::class, 'update']); // Atualizar
    Route::delete('/{id}', [ImovelController::class, 'destroy']); // Remover
});