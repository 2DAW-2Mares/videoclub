<?php

namespace App\Http\Controllers;
use App\Movie;

class CatalogController extends Controller {

    public function getIndex() {
        $movies = Movie::all();
        return view('catalog.index',
            array(
                'movies' => $movies,
            )
        );
    }

    public function getShow($id) {
        $movies = Movie::find($id);
        return view('catalog.show', array(
            'pelicula' => $movies,
            'id'       => $id,
        ));
    }

    public function getCreate() {
        return view('catalog.create');
    }

    public function getEdit($id) {
        return view('catalog.edit', array('id' => $id));
    }

}
