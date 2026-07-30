<?php

use App\Http\Controllers\newsController;
use App\Http\Controllers\galleryController;
use App\Http\Controllers\contactController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');

Route::get('/news', [newsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [newsController::class, 'show'])->name('news.show');
Route::post('/news', [newsController::class, 'store']);
Route::put('/news/{id}', [newsController::class, 'update']);
Route::delete('/news/{id}', [newsController::class, 'destroy']);

Route::get('/gallery', [galleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{id}', [galleryController::class, 'show'])->name('gallery.show');
Route::post('/gallery', [galleryController::class, 'store']);
Route::put('/gallery/{id}', [galleryController::class, 'update']);
Route::delete('/gallery/{id}', [galleryController::class, 'destroy']);

Route::get('/contact', [contactController::class, 'index'])->name('contact.index');
Route::get('/contact/{id}', [contactController::class, 'show'])->name('contact.show');
Route::post('/contact', [contactController::class, 'store'])->name('contact.store');
Route::put('/contact/{id}', [contactController::class, 'update']);
Route::delete('/contact/{id}', [contactController::class, 'destroy']);
