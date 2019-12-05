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

Route::get('login', function () {
    return view('auth.login');
});
Route::get('logout', function () {
    return view('auth.logout');
});
Route::get('catalog', 'CatalogController@getIndex');

Route::get('catalog/show/{id}', 'CatalogController@getShow')->where('id', '[0-9]+');

Route::get('catalog/create', 'CatalogController@getCreate');
Route::post('catalog/create', 'CatalogController@postCreate');
Route::get('catalog/edit/{id}', 'CatalogController@getEdit')->where('id', '[0-9]+');
Route::put('catalog/edit/{id}', 'CatalogController@putEdit')->where('id', '[0-9]+');
