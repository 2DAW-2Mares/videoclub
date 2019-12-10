<?php

namespace App\Http\Controllers;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function putEdit(Request $request) {

        $pelicula           = Movie::findOrFail($request->idHidden);
        $pelicula->title    = $request->title;
        $pelicula->year     = $request->year;
        $pelicula->director = $request->director;
        if ($request->exists('poster')) {
            $pelicula->poster = Storage::disk('public')->putFile('posters', $request->file('poster'));
        }
        /* $pelicula->poster   = $request->poster;*/
        $pelicula->synopsis = $request->synopsis;
        $pelicula->save();
        return redirect(action('CatalogController@getIndex'));
    }

    public function postCreate(Request $request) {
        $pelicula           = new Movie;
        $pelicula->title    = $request->title;
        $pelicula->year     = $request->year;
        $pelicula->director = $request->director;
        if ($request->exists('poster')) {
            $pelicula->poster = Storage::disk('public')->putFile('posters', $request->file('poster'));
        }
        /*$pelicula->poster   = $request->poster;*/
        $pelicula->synopsis = $request->synopsis;
        $pelicula->save();
        return redirect(action('CatalogController@getIndex'));
    }

    public function changeRented(Request $request) {
        $pelicula = Movie::findOrFail($request->idHidden);
        if ($pelicula->rented) {
            $pelicula->rented = false;
        } else {
            $pelicula->rented = true;
        }
        $pelicula->save();
        return view('catalog.show', array(
            'pelicula' => $pelicula,
        ));

    }

}
