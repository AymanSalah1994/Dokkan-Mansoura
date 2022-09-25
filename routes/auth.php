<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//Auth Routes
Auth::routes();


Route::get('/auth/google/redirect', [LoginController::class, 'redirectToGoogle'])->name('redirect.google');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('callback.google');


Route::get('/auth/facebook/redirect', [LoginController::class, 'redirectToFacebook'])->name('redirect.facebook');
Route::get('/auth/facebook/callback', [LoginController::class, 'handleFacebookCallback'])->name('callback.facebook');
