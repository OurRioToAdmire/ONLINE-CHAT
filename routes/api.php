<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/mensajes',[MensajeController::class, 'sendMessage']);
Route::get('/chat/{user1}/{user2}',[MensajeController::class, 'getChat']);
