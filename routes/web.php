<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

Route::get('/',[PublicController::class, 'home'])->name('home');

Route::get('/article/create',[ArticleController::class, 'create'])->name('article.create');
Route::get('/article/index',[ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}',[ArticleController::class, 'show'])->name('article.show');
Route::get('/category/{category}',[ArticleController::class, 'byCategory'])->name('article.byCategory');