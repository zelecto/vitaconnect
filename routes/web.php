<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublicationsController;
use App\Http\Controllers\ReactionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', LoginController::class);

Route::post('/Autenticar', [LoginController::class, 'autenticar']);

Route::post('/RegisterUser', [UserController::class, 'store']);

Route::get('/Home/{email}', HomeController::class);

Route::post('/CreatePost', [PublicationsController::class, 'create'])->name('create.post');

Route::post('/CreateReaction/{id_publication}/{user_email}', [ReactionsController::class, 'create'])->name('reaction.create');
