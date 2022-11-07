<?php

use AB\Authify\AuthsController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthsController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/login', 'customLogin');
    Route::post('/register', 'customRegister');
});
