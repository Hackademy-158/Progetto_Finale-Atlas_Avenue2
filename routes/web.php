<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;



// Main Section -> Main Routes (Navbar)
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::get('/about', [PublicController::class, 'about'])->name('about');


// Sub Section -> Main Routes
Route::get('/features', [PublicController::class, 'features'])->name('features');
Route::get('/pricing', [PublicController::class, 'pricing'])->name('pricing');
Route::get('/faq', [PublicController::class, 'faq'])->name('faq');
Route::get('/about', [PublicController::class, 'about'])->name('about');

// Sub Section -> Social Routes

Route::get('/social', [PublicController::class, 'social'])->name('social');


// Article Section
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');

// User Section
// Route::get('/dashboard')
