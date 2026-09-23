<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\ContactApiController;
use App\Http\Controllers\Api\ContactInfoApiController;
use App\Http\Controllers\Api\DashboardApiController;
use App\Http\Controllers\Api\GalleryApiController;
use App\Http\Controllers\Api\NewsApiController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthApiController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthApiController::class, 'logout']);
    Route::get('/me', [AuthApiController::class, 'me']);

    Route::get('/dashboard/stats', [DashboardApiController::class, 'stats']);

    Route::apiResource('news', NewsApiController::class);
    Route::apiResource('gallery', GalleryApiController::class);
    Route::apiResource('contacts', ContactApiController::class)->only(['index', 'show', 'update', 'destroy']);
    Route::apiResource('contact-info', ContactInfoApiController::class)->only(['index', 'store']);
});
