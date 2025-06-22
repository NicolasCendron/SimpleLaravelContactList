<?php

use App\Http\Controllers\ContactController;

Route::post('/contacts', [contactController::class, 'store']);
Route::get('/contacts', [contactController::class, 'index']);
Route::get('/contacts/{id}', [contactController::class, 'show']);
#destroy
Route::delete('/contacts/destroy/{id}', [contactController::class, 'destroy']);
#destroy_all
Route::delete('/contacts/destroy_all', [contactController::class, 'destroyAll']);