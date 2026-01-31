<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TicketController;

// Autenticación
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas (agrega middleware 'auth:sanctum' si usas tokens, pero por ahora básicas)
Route::apiResource('users', UserController::class);
Route::apiResource('clients', ClientController::class);
Route::apiResource('tickets', TicketController::class);