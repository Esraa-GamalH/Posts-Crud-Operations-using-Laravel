<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\postController;

Route::get('/posts', [postController::class, "index"])->name("posts.index");
Route::get('/posts/create', [postController::class, "create"])->name("posts.create");
Route::get('/posts/{id}', [postController::class, "show"])->name("posts.show")->where('id', '[0-9]+');
Route::get('/posts/{id}/edit', [postController::class, "edit"])->name("posts.edit")->where('id', '[0-9]+');
