<?php

use App\Http\Controllers\UserController;


use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\VerificationController;


Route::get('/login', [UserController::class, 'login'])->name('login');
Route::middleware('guest')->group(function () {
    Route::post('/login', [UserController::class, 'loginAuth'])->name('loginAuth');
    Route::post('/registration', [UserController::class, 'store'])->name('user.store');
    Route::get('/registration', [UserController::class, 'create'])->name('register');
});


Route::middleware('auth')->group(function () {

    Route::get('/verify-email', [VerificationController::class, 'verificationNotice'])
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verifyEmail'])
        ->middleware('signed')->name('verification.verify');

    Route::post('/email/verification-notification', [VerificationController::class, 'sendAgainVerificationNotification'])
        ->middleware('throttle:2,1')->name('verification.send');

    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/', [UserController::class, 'profile'])->name('user.profile');
});


