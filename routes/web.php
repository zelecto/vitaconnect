<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', LoginController::class);
Route::post('/Autenticar', [LoginController::class, 'autenticar']);

Route::post('/RegisterUser', [UserController::class, 'store']);

Route::get('/Home/{user}', HomeController::class);
