<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublicationsController;
use App\Http\Controllers\ReactionsController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/', LoginController::class);

Route::post('/Autenticar', [LoginController::class, 'autenticar']);

Route::post('/RegisterUser', [UserController::class, 'store']);

Route::get('/Home/{email}', HomeController::class);

Route::post('/CreatePost', [PublicationsController::class, 'create'])->name('create.post');

Route::post('/CreateReaction/{id_publication}/{user_email}', [ReactionsController::class, 'store'])->name('reaction.create');

Route::post(
    '/CreateComment/{id_publication}/{user_email}/{comentario}',
    [CommentController::class, 'store']
)->name('comment.create');

Route::post('/Follow/{user_email}/{follow_email}', [FollowController::class, 'follow'])->name('follow');

Route::post('/CreateStory', [StoryController::class, 'store'])->name('create.story');

Route::get('/UserPerfil/{email_user}', UserController::class);
