<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'es'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');
