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

/* Route::get('login', function () {
    return view('auth.login');
});
Route::get('logout', function () {
    return view('auth.logout');
}); */

        Route::get('/', 'CatalogController@getIndex');

        Route::get('show/{id}', 'CatalogController@getShow')->where('id', '[0-9]+');

Route::get('catalog/edit/{id}', 'CatalogController@getEdit')->where('id', '[0-9]+')->middleware('auth');
Route::put('catalog/edit', 'CatalogController@putEdit')->middleware('auth');
Route::resource('movie', 'MovieController');
Route::put('peliculaAlquilada', 'MovieController@peliculaAlquilada');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
