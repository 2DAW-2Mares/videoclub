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
    $conectado="";
    $conectado = "conectado";
    return $conectado;
});
Route::get('/logout', function () {
    $conectado="";
    $conectado = "desconectado";
    return $conectado;
});

Route::get('/catalog', function () {
    $conectado="";
    $conectado = "Listado peliculas";
    return $conectado;
});
Route::get('/catalog', function () {
    $conectado="";
    $conectado = "Listado peliculas";
    return $conectado;
});
Route::get('/catalog/show/{id}', function ($id) {
    $conectado="";
    $conectado = "Listado peliculas".$id;
    return $conectado;
});
Route::get('/create', function () {
    $conectado="";
    $conectado = "Añadir pelicula";
    return $conectado;
});

Route::get('catalog/edit/{id}', function ($id) {
    $conectado="";
    $conectado = "Modificar pelicula".$id;
    return $conectado;
});