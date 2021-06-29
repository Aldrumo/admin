<?php

use Aldrumo\Admin\Http\Controllers;
use Aldrumo\Admin\Http\Middleware\InjectEditor;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('Admin::dashboard');
})->name('admin.dashboard');

Route::get(
    '/aldrumo-api/pages/{id}',
    Controllers\Api\PageRenderController::class
)->name('admin.api.page.renderer')
->middleware(InjectEditor::class);

Route::view('/admin/pages', 'Admin::pages.index')->name('admin.pages.index');

Route::view('/admin/themes', 'Admin::themes.index')->name('admin.themes.index');
