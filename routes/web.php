<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;

// Guest routes (not logged in)
Route::middleware('guest')->group(function () {
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', Register::class);

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', Login::class);
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit']);
    Route::put('/tasks/{task}', [TaskController::class, 'update']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
    Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete']);

    Route::post('/logout', Logout::class)->name('logout');
});

/**
*use Illuminate\Support\Facades\Route;
*use App\Http\Controllers\TaskController;
*use App\Http\Controllers\Auth\Register;
*use App\Http\Controllers\Auth\Login;
*use App\Http\Controllers\Auth\Logout;

*Route::middleware('auth')->group(function () {
*    Route::get('/', [TaskController::class, 'index']);
*    Route::post('/tasks', [TaskController::class, 'store']);
*    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit']);
*    Route::put('/tasks/{task}', [TaskController::class, 'update']);
*    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
*    Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete']);
*});

*Route::view('/register', 'auth.register')
*    ->middleware('guest')
*    ->name('register');

*Route::post('/register', Register::class)
*    ->middleware('guest');

*Route::view('/login', 'auth.login')
*    ->middleware('guest')
*    ->name('login');

*Route::post('/login', Login::class)
*    ->middleware('guest');

*Route::post('/logout', Logout::class)
*    ->middleware('auth')
*    ->name('logout');*/