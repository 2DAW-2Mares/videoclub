<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Movie;

class CatalogController extends Controller {
    public function getIndex() {
        return view('catalog.index',
            array(
                'arrayPeliculas' => Movie::all(),
            )
        );
    }

    public function getShow($id) {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show', array(
            'pelicula' => $pelicula,
        ));
    }

    public function getCreate() {
        return view('catalog.create');
    }

    public function getEdit($id) {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', array(
            'pelicula' => $pelicula,
        ));
    }

    public function putEdit(Request $request){
        $pelicula = Movie::findOrFail($request->idHidden);
        $pelicula->title = $request->title;
        $pelicula->year = $request->year;
        $pelicula->director = $request->director;
        $pelicula->poster = $request->poster;
        $pelicula->synopsis = $request->synopsis;
        $pelicula->save();
        return redirect(action('CatalogController@getIndex'));
    }

    public function postCreate(Request $request) {
        $pelicula = new Movie;
        $pelicula->title = $request->title;
        $pelicula->year = $request->year;
        $pelicula->director = $request->director;
        $pelicula->poster = $request->poster;
        $pelicula->synopsis = $request->synopsis;
        $pelicula->save();
        return redirect(action('CatalogController@getIndex'));
    }

}

