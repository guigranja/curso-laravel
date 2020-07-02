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

Route::get('/series', 'SeriesController@index')
    ->name('listar_series');
Route::get('/series/adicionar', 'SeriesController@create')
    ->name('form_add_serie'); // Dando o nome para a rota

Route::post('/series/adicionar', 'SeriesController@store');

// Rota para remover. Usamos post para que nenhum robo delete
Route::delete('/series/{id}', 'SeriesController@destroy');
