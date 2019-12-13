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

Route::get('/', 'HomeController@getHome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('movies', 'MovieController')->middleware('auth');

Route::put('movies/changeRented/{movie}', 'MovieController@changeRented')->middleware('auth');

