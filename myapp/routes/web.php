<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    return view('create');
});

Route::get('/list', function () {
    return view('list');
});

Route::get('/edit', function(){
    return view('edit');
});

Route::post('/create', 'App\Http\Controllers\TaskController@create');
Route::get('/list', 'App\Http\Controllers\TaskController@index');
Route::post('/edit', 'App\Http\Controllers\TaskController@edit');
Route::post('/delete', 'App\Http\Controllers\TaskController@delete');
