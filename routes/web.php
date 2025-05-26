<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route dengan parameter {category}
Route::get('/menu/{category}', [MenuController::class, 'showByCategory'])->name('menu');
