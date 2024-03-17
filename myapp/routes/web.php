<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route::get('/create', function () {
//     return view('create');
// });

// Route::post('/create', [TaskController::class, 'create']);

// Route::get('/list', [TaskController::class, 'show']);
// Route::delete('/list', [TaskController::class, 'delete']);
// Route::put('/list', [TaskController::class, 'update']);

// Route::get('/edit/{id}', [TaskController::class, 'edit']);

// Route::post('/list', [TaskController::class, 'show']);

Route::resource('tasks', TaskController::class);
Route::redirect('/', '/tasks');
