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

// Route::get('/member-table', MemberTable::class)->name('member');


Route::get('edit-profile/{member_id}', function () {
    return view('edit-profile');
})->name('edit-profile');


Route::get('member-view/{rowId}', function () {
    return view('member-view');
})->name('member-view');


// Route::get('view-member/{rowId}', function () {
//     return view('view-member');
// })->name('view-member');





    Route::get('/profile-complete', function () {
        return view('profile-complete');
    })->name('profile-complete');

    Route::get('/profile-view', function () {
        return view('profile-view');
    })->name('profile-view');
   
   
});






