<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class CatalogController extends Controller
{
    public function getIndex()
    {
        $movies = Movie::all();
        /*return view('catalog.index',
            array(
                'arrayPeliculas' => $this->arrayPeliculas
            )
        );*/
    }

    public function getShow($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show', array('pelicula' => $pelicula));
        /*return view('catalog.show', array(
            'pelicula' => $this->arrayPeliculas[$id],
            'id' => $id,
        ));*/
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getEdit($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', array('pelicula' => $pelicula));
        /*return view('catalog.edit', array('id'=>$id));*/
    }
}
