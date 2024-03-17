<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/member', function () {
        return view('member');
    })->name('member');

    Route::get('/profile-complete', function () {
        return view('profile-complete');
    })->name('profile-complete');
   
   
});






