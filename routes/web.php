<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages::home');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::livewire('/account', 'pages::account')->name('account');

    Route::prefix('issues')->group(function () {
        Route::livewire('/create', 'pages::issues.create')->name('issues.create');
    });
});
