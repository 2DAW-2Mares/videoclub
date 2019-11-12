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

Route::get('/login',function(){
    return ('login usuario');
});

Route::get('/logout',function(){
    return ('logout usuario');
});

Route::get('/catalog',function(){
    return ('listado de peliculas');
});

Route::get('/catalog/show/{id}',function($id){
    return ('vista detalle pelicula');
});

Route::get('/catalog/create',function(){
    return ('Añadir pelicula');
});

Route::get('/catalog/edit/{id}',function($id){
    return ('Modificar pelicula');
});
