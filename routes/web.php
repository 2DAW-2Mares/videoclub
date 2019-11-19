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
/*
Route::get('catalog', function () {
    return view('catalog.index');
});*/
Route::get('/catalog', 'CatalogController@getIndex');

/*
Route::get('catalog/show/{id}', function ($id) {
    return view('catalog.show', array('id'=>$id));
})->where('id', '[0-9]+');*/
Route::get('/catalog/show/{id}', 'CatalogController@getshow');
/*
Route::get('catalog/create', function () {
    return view('catalog.create');
});*/
Route::get('/catalog/create', 'CatalogController@getCreate');

/*
Route::get('catalog/edit/{id}', function ($id) {
    return view('catalog.edit', array('id'=>$id));
});*/
Route::get('/catalog/edit/{id}', 'CatalogController@getEdit')
->where('id', '[0-9]+');
