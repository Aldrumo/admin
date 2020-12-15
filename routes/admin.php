<?php

use Aldrumo\Admin\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('Admin::dashboard');
})->name('admin.dashboard');


Route::get(
    '/aldrumo-api/pages/{id}',
    Controllers\Api\PageRenderController::class
)->name('admin.api.page.renderer');

Route::get('/admin/pages', function () {
    return view('Admin::pages.index');
})->name('admin.pages.index');
