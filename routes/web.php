<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::controller(ImageController::class)
    ->group(function () {
        Route::get('', 'index')->name('home');
        Route::post('/images', 'store')->name('upload');
    });
