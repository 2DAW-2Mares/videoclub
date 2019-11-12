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
    return view('welcome');
});

Route::get('/login', function () {
    return ('hola');
});

Route::get('/logout', function () {
    return ('adios');
});

Route::get('/catalog', function () {
    return ('Catalogo de peliculas');
});

Route::get('/catalog/show/{id}', function ($id) {
    return ('Pelicula de id ' . $id);
})
->where('id', '[0-9]+');

Route::get('/catalog', function () {
    return ('Crear catálogo');
});

Route::get('/catalog/edit/{id}', function ($id) {
    return ('Vas a editar la peli del id ' . $id);
})
->where('id', '[0-9]+');

