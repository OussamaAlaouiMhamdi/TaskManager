<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::get('/', function () {
        return redirect()->route('tasks.index');
    });
});


Route::get('/', function () {
    return redirect()->route('login');
});

