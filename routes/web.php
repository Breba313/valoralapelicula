<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//  Ruta de Inicio (Front-End)
Route::get('/', 'FrontController@index');

// Rutas de Logueo y autenticacion
Auth::routes();

//  Ruta de Inicio
Route::get('/home', 'HomeController@index');

// Ruta de valoracion de palicula
Route::group(['middleware' => ['auth']], function () {
    Route::post('/valorar/{id}', 'FrontController@postValorar');
    Route::get('/quitarValor/{id}', 'FrontController@quitarValor');
});
