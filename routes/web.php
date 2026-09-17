<?php

use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminContactInfoController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminGalleryController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/auth', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::get('/news', [AdminNewsController::class, 'index'])->name('admin.news.index');
        Route::get('/news/{id}', [AdminNewsController::class, 'show'])->name('admin.news.edit');
        Route::post('/news', [AdminNewsController::class, 'store'])->name('admin.news.create');
        Route::put('/news/{id}', [AdminNewsController::class, 'update'])->name('admin.news.update');
        Route::delete('/news/{id}', [AdminNewsController::class, 'destroy'])->name('admin.news.delete');

        Route::get('/gallery', [AdminGalleryController::class, 'index'])->name('admin.gallery.index');
        Route::get('/gallery/{id}', [AdminGalleryController::class, 'show'])->name('admin.gallery.edit');
        Route::post('/gallery', [AdminGalleryController::class, 'store'])->name('admin.gallery.create');
        Route::put('/gallery/{id}', [AdminGalleryController::class, 'update'])->name('admin.gallery.update');
        Route::delete('/gallery/{id}', [AdminGalleryController::class, 'destroy'])->name('admin.gallery.delete');

        Route::get('/contact', [AdminContactController::class, 'index'])->name('admin.contact.index');
        Route::get('/contact/{id}', [AdminContactController::class, 'show'])->name('admin.contact.edit');
        Route::put('/contact/{id}', [AdminContactController::class, 'update'])->name('admin.contact.update');
        Route::delete('/contact/{id}', [AdminContactController::class, 'destroy'])->name('admin.contact.delete');
        Route::get('/admin/contact/{id}/reply', [AdminContactController::class, 'replyForm'])->name('admin.contact.reply');

        Route::get('/contact-info', [AdminContactInfoController::class, 'index'])->name('admin.contact-info.index');
        Route::get('/contact-info/{id}', [AdminContactInfoController::class, 'show'])->name('admin.contact-info.edit');
        Route::post('/contact-info', [AdminContactInfoController::class, 'store'])->name('admin.contact-info.create');
        Route::put('/contact-info/{id}', [AdminContactInfoController::class, 'update'])->name('admin.contact-info.update');
        Route::delete('/contact-info/{id}', [AdminContactInfoController::class, 'destroy'])->name('admin.contact-info.delete');
    });
});
