<?php
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::get('/', 'HomeController@getHome');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(["middleware" => "auth"], function () {
    Route::get('catalog', 'CatalogController@getIndex');
    Route::get('catalog/show/{id}', 'CatalogController@getShow')->where('id', '[0-9]+');
    Route::get("catalog/create", "CatalogController@getCreate");
    Route::get('catalog/edit/{id}', 'CatalogController@getEdit')->where('id', '[0-9]+');
    Route::post("catalog/postCreate", "CatalogController@postCreate")->where('id', '[0-9]+');
    Route::put("catalog/postEdit", 'CatalogController@putEdit')->where('id', '[0-9]+');
    Route::put("catalog/changeRented", "CatalogController@changeRented")->where('id', '[0-9]+');
});
