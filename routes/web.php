<?php

use App\Mail\TaskDeadline;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    Route::view('tasks-index', 'tasks.tasks-index')
        ->name('tasks-index');

    Route::view('task-show/{userId}/{taskId}', 'tasks.task-show')
        ->name('task-show');
});

Route::view('task-show-signed/{userId}/{taskId}', 'tasks.task-show')
    ->name('task-show-signed')
    ->middleware('signed');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/testroute', function () {
    Mail::to('lipa71sqad@gmail.com')->send(new TaskDeadline(['name' => 'lipa']));
});

require __DIR__.'/auth.php';
