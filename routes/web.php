<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\Admin\adminNewsController;
use App\Http\Controllers\galleryController;
use App\Http\Controllers\Admin\adminGalleryController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\Admin\adminContactController;
use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

Route::get('/auth', [authController::class, 'index'])->name('login');
Route::post('/login', [authController::class, 'login']);
Route::post('/logout', [authController::class, 'logout'])->name('logout');

Route::get('/', [homeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::get('/news', [newsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [newsController::class, 'show'])->name('news.show');
Route::get('/gallery', [galleryController::class, 'index'])->name('gallery.index');
Route::get('/contact', [contactController::class, 'index'])->name('contact.index');
Route::post('/contact', [contactController::class, 'store'])->name('contact.store');

Route::middleware('auth')->group(function () {
  Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [adminController::class, 'index'])->name('admin.dashboard');

    Route::get('/news', [adminNewsController::class, 'index'])->name('admin.news.index');
    Route::get('/news/{id}', [adminNewsController::class, 'show'])->name('admin.news.edit');
    Route::post('/news', [adminNewsController::class, 'store'])->name('admin.news.create');
    Route::put('/news/{id}', [adminNewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/news/{id}', [adminNewsController::class, 'destroy'])->name('admin.news.delete');

    Route::get('/gallery', [adminGalleryController::class, 'index'])->name('admin.gallery.index');
    Route::get('/gallery/{id}', [adminGalleryController::class, 'show'])->name('admin.gallery.edit');
    Route::post('/gallery', [adminGalleryController::class, 'store'])->name('admin.gallery.create');
    Route::put('/gallery/{id}', [adminGalleryController::class, 'update'])->name('admin.gallery.update');
    Route::delete('/gallery/{id}', [adminGalleryController::class, 'destroy'])->name('admin.gallery.delete');

    Route::get('/contact', [adminContactController::class, 'index'])->name('admin.contact.index');
    Route::get('/contact/{id}', [adminContactController::class, 'show'])->name('admin.contact.edit');
    Route::put('/contact/{id}', [adminContactController::class, 'update'])->name('admin.contact.update');
    Route::delete('/contact/{id}', [adminContactController::class, 'destroy'])->name('admin.contact.delete');
  });
});
