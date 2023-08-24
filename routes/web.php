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

Route :: resource('equipos', 'App\Http\Controllers\equiposController');

Route::get('/equipos', 'App\Http\Controllers\equiposController@index')->name('equipos.index');
Route::post('/equipos', 'App\Http\Controllers\equiposController@store')->name('equipos.store');
Route::get('/sorteo', 'App\Http\Controllers\equiposController@sorteo')->name('equipos.sorteo');
