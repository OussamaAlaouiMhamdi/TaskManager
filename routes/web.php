<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\TaskController;

Route::resource('tasks', TaskController::class);
Route::get('/', function () {
    return redirect()->route('tasks.index');
});
