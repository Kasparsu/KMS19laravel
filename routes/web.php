<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class,'home']);
//Route::get('/posts', [\App\Http\Controllers\PostController::class,'index']);
//Route::get('/posts/create', [\App\Http\Controllers\PostController::class,'create']);
//Route::post('/posts', [\App\Http\Controllers\PostController::class,'store']);
//Route::get('/posts/{post}', [\App\Http\Controllers\PostController::class,'show']);
//Route::get('/posts/edit/{post}', [\App\Http\Controllers\PostController::class,'edit']);
//Route::post('/posts/{post}', [\App\Http\Controllers\PostController::class,'update']);
//Route::get('/posts/delete/{post}', [\App\Http\Controllers\PostController::class,'destroy']);

Route::middleware(['auth'])->group(function() {
    Route::resource('posts', \App\Http\Controllers\PostController::class);
    Route::post('/{post}/comment', [\App\Http\Controllers\CommentController::class, 'store']);
});

Route::get('/{post}', [\App\Http\Controllers\HomeController::class, 'post']);
