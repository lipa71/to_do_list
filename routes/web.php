<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    Route::view('tasks-index', 'tasks.tasks-index')
        ->name('tasks-index');

    Route::view('task-show/{userId}/{taskId}', 'tasks.task-show')
        ->name('task-show');

    Route::view('task-history/{userId}/{taskId}', 'tasks.task-history-list')
        ->name('task-history');
});

Route::view('task-show-signed/{userId}/{taskId}', 'tasks.task-show')
    ->name('task-show-signed')
    ->middleware('signed');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
