<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('Admin::dashboard');
})->name('admin.dashboard');

Route::get('/admin/pages', function () {
    return "hello world";
})->name('admin.pages.index');
