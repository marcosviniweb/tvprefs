<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use  App\Http\Controllers\VideosController;

Route::get('/', 'VideosController@index');
Route::post('/', 'VideosController@cadastro');
Route::get('/cadastro', function () {
    return view('cadastro');
});

