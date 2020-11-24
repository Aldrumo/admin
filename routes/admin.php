<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('Admin::dashboard');
})->name('dashboard');
