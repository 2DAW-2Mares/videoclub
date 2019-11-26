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

<<<<<<< HEAD
Route::get('/', function () {
    return view('home');
});
<<<<<<< HEAD

Route::get('/login', function () {
    return "login";
});

Route::get('/logout', function () {
    return "logout";
});

Route::get('/catalog', function () {
    return "catalog";
});

Route::get('/catalog/show{id}', function ($id) {
    return "catalog";
});

Route::get('catalog/create}', function () {
    return "catalog";
});

Route::get('/catalog/edit{id}', function ($id) {
    return "catalog";
});
=======
=======
Route::get('/', 'HomeController@getHome');

>>>>>>> b674478b46a62c8e282dad54df54a0818be575a1
Route::get('login', function () {
    return view('auth.login');
});
Route::get('logout', function () {
    return view('auth.logout');
});
<<<<<<< HEAD
Route::get('catalog', function () {
    return view('catalog.index');
});
Route::get('catalog/show/{id}', function ($id) {
    return view('catalog.show', array('id'=>$id));
})->where('id', '[0-9]+');
Route::get('catalog/create', function () {
    return view('catalog.create');
});
Route::get('catalog/edit/{id}', function ($id) {
    return view('catalog.edit', array('id'=>$id));
})->where('id', '[0-9]+');
>>>>>>> 5e564e98d49d2e2a191245b303abc2c2ac104234
=======
Route::get('catalog', 'CatalogController@getIndex');

Route::get('catalog/show/{id}', 'CatalogController@getShow')->where('id', '[0-9]+');

Route::get('catalog/create', 'CatalogController@getCreate');

Route::get('catalog/edit/{id}', 'CatalogController@getEdit')->where('id', '[0-9]+');
>>>>>>> b674478b46a62c8e282dad54df54a0818be575a1
