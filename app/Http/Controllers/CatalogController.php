<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
class CatalogController extends Controller
{
    public function getIndex()
    {
        $movie = Movie::all();
        return view('catalog.index',
            array(
                'arrayPeliculas' => $movie
            )
        );
    }

    public function getShow($id)
    {
        $movie = Movie::findOrFail($id+1);
        return view('catalog.show', array(
            'pelicula' => $movie,
            'id' => $id,
        ));
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getEdit($id)
    {
        $movie = Movie::findOrFail($id+1);
        return view('catalog.edit', array('pelicula'=>$movie,'id'=>$id));
    }


}
