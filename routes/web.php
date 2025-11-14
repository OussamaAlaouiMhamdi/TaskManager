<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;

// Authentication routes
Auth::routes();

// Task routes with auth middleware
Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::get('/', function () {
        return redirect()->route('tasks.index');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// Public redirect to login
Route::get('/', function () {
    return redirect()->route('login');
});

