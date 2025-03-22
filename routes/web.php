<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('tasks-index', 'tasks.tasks-index')
    ->middleware(['auth', 'verified'])
    ->name('tasks-index');

Route::view('task-show', 'tasks.task-show')
    ->middleware(['auth', 'verified'])
    ->name('task-show');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
