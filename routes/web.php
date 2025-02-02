<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\GoogleController;
use App\Http\Middleware\IsRevisor;

// Main Section -> Main Routes (Navbar)
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::get('/about', [PublicController::class, 'about'])->name('about');

// Sub Section -> Main Routes
Route::get('/features', [PublicController::class, 'features'])->name('features');
Route::get('/pricing', [PublicController::class, 'pricing'])->name('pricing');
Route::get('/faq', [PublicController::class, 'faq'])->name('faq');

// Sub Section -> Social Routes
Route::get('/social', [PublicController::class, 'social'])->name('social');

// Article Section
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::get('/annunci/catalogo', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');

// Revisor Area
Route::middleware(['isRevisor'])->group(function () {
    Route::get('/revisor/dashboard', [RevisorController::class, 'index'])->name('revisor.dashboard');
    Route::get('/revisor/approved', [RevisorController::class, 'approved'])->name('revisor.approved');
    Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
    Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
});

// Revisor Routes
Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
//Dynamic Search
Route::get('/search/article', [PublicController::class, 'searched'])->name('article.search');

// Google Section
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
