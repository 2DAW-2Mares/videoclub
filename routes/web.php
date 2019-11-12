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

Route::get('/', function () {
    return view('pantallaprincipal');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    return view('logout');
});

Route::get('/catalog', function () {
    return view('catalog');
});

Route::get('/catalog/show/{id}', function ($id) {
    return view('catalogId',array('id' => $id));
})
->where('id', '[0-9]+');

Route::get('/catalog/create', function() {
    return view('catalogCreate');
});

Route::get('/catalog/edit/{id}', function($id) {
    return view('catalogEdit',array('id' => $id));
})
->where('id', '[0-9]+');