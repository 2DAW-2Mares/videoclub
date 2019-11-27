<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
class CatalogController extends Controller
{
    public function getIndex()
    {
      $arrayPeliculas =Movie::all();
        return view('catalog.index',
            array(
                'arrayPeliculas' =>$arrayPeliculas
            )
        );
    }

    public function getShow($id)
    {
      $pelicula = Movie::findOrFail($id+1);

        return view('catalog.show', array(
            'pelicula' => $pelicula,
            'id' => $id,
        ));
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getEdit($id)
    {
      $pelicula = Movie::findOrFail($id+1);

        return view('catalog.edit', array(
            'pelicula' => $pelicula,
            'id' => $id,
        ));
    }


}
