<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class CatalogController extends Controller
{
    public function getIndex()
    {
        $pelis = Movie::all();
        return view('catalog.index',
            array(
                'arrayPeliculas' => $pelis
            )
        );
    }

    public function getShow($id)
    {
        $pelis = Movie::findOrFail($id+1);
        return view('catalog.show', array(
            'pelicula' => $pelis,
            'id' => $id,
        ));
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getEdit($id)
    {

        $pelis = Movie::findOrFail($id+1);
        return view('catalog.edit', array(
            'pelicula' => $pelis,
            'id' => $id,array('id'=>$id+1)
        ));
        
        /* return view('catalog.edit', array('id'=>$id)); */
    }

}
