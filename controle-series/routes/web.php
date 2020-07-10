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

/*
 * Passa qual ação sera tomada (get, post, delete ...)
 * Passa a controller que será chamada
 * depois do @ passa qual metodo será chamado para aquela rota
 * */

Route::get('/series', 'SeriesController@index')
    ->name('listar_series');

Route::get('/series/adicionar', 'SeriesController@create')
    ->name('form_add_serie'); // Dando o nome para a rota

Route::post('/series/adicionar', 'SeriesController@store');

// Rota para remover. Usamos post para que nenhum robo delete
Route::delete('/series/{id}', 'SeriesController@destroy');

Route::post('/series/{id}/editaNomeSerie', 'SeriesController@editaNomeSerie');

// Rota para as temporadas de uma serie
Route::get('/series/{serieID}/temporadas', 'TemporadasController@index');

Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');

Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir');

// Autenticação padrão do Laravel
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Criando nossa propria rota de login (entrar)
Route::get('/entrar', 'EntrarController@index');
Route::post('/entrar', 'EntrarController@entrar');
