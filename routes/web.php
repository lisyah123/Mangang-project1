<?php

use App\Http\Controllers\ProjectController;

// Arahkan URL utama ke halaman daftar proyek
Route::get('/', [ProjectController::class, 'index']);

// Route ini akan otomatis membuat semua URL yang dibutuhkan untuk CRUD
// (index, create, store, show, edit, update, destroy)
Route::resource('projects', ProjectController::class);
