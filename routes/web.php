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

/    Pantalla principal
login    Login usuario
logout    Logout usuario
catalog    Listado películas
catalog/show/{id}    Vista detalle película {id}
catalog/create    Añadir película
catalog/edit/{id}    Modificar película {id}
Para comprobar que las rutas se hayan creado correctamente utiliza el
comando de artisan que devuelve un listado de rutas y además prueba también las rutas en el navegador.
 */
Route::get('/', function () {
    return view("home");
});

Route::get('/login', function () {
    return view("auth/login");
});
Route::get('/logout', function () {
    return view("auth/logout");
});
Route::get('/catalog', function () {
    return view("catalog/index");
});
Route::get('/catalog/show/{id}', function ($id) {
    $texto = "Vista detalle película " . $id;
    return view("catalog/show", array("id" => $id));
})->where('id', '[0-9]+');

Route::get('/catalog/create', function () {
    return view("catalog/create");
});
Route::get('/catalog/edit/{id}', function ($id) {
    $texto = "Modificar película " . $id;
    return view("catalog/edit", array("id" => $id));
})->where('id', '[0-9]+');
