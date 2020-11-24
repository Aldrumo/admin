<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('Admin::dashboard');
})->name('admin.dashboard');
