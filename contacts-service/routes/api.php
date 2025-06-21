<?php

use App\Http\Controllers\ContatoController;

Route::post('/contatos', [ContatoController::class, 'store']);
Route::get('/contatos', [ContatoController::class, 'index']);
Route::get('/contatos/{id}', [ContatoController::class, 'show']);
#destroy
Route::delete('/contatos/destroy/{id}', [ContatoController::class, 'destroy']);
#destroy_all
Route::delete('/contatos/destroy_all', [ContatoController::class, 'destroyAll']);