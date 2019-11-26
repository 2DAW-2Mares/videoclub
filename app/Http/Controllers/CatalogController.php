<?php

namespace App\Http\Controllers;
use App\Movie;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function getIndex()
    {
        $peliculas = Movie::all();
        return view('catalog.index',
            array(
                'arrayPeliculas' => $peliculas
            )
        );
    }

    public function getShow($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show', array(
            'pelicula' => $pelicula
        ));
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getEdit($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', array('pelicula'=>$pelicula));
    }


}
