<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Clase 1) Form Request
Route::get('/validator-fails', 'RequestValidationController@validatorFailure');
Route::post('/request-validation', 'RequestValidationController@primerEjemplo');

// Clase 2) Modelos (accesors y  mutators)
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mutator', 'HomeController@update');

// Clase 3) Rutas y Middlewares
Route::namespace('Movies')
	->prefix('/peliculas')
	->name('peliculas.')
	->middleware(['auth', VerifyAge::class])
	->group(function() {
			    Route::get('/', 'MoviesController@index')->name('index');
			    Route::get('/adultos', 'MoviesController@showAdultMovies')->name('adultos');
			});

Route::get('/peliculas/comedia/{subgenero}', 'Movies/MoviesController@showComedyMovies')->name('comedia')->middleware('auth');