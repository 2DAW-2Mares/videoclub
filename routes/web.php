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

Route::group(['prefix' => 'catalog', 'middleware' => 'auth'], function() {
    Route::get('/', 'CatalogController@getIndex');

    Route::get('show/{id}', 'CatalogController@getShow')->where('id', '[0-9]+');

    Route::get('create', 'CatalogController@getCreate');
    Route::post('create', 'CatalogController@postCreate');

    Route::get('edit/{id}', 'CatalogController@getEdit')->where('id', '[0-9]+');
    Route::put('edit', 'CatalogController@putEdit');

    Route::put('/changeRented', 'CatalogController@changeRented');
});

Route::resource('movies', 'Moviecontroller')->middleware('auth');
Route::put('movies/changeRented/{movie}', 'Moviecontroller@changeRented')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
