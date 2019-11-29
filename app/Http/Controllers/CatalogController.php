<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
<<<<<<< HEAD
=======

>>>>>>> bd5381467e6cffbbd7bcba9345b61c5b4db34316
class CatalogController extends Controller
{
    public function getIndex()
    {
        $listaPeliculas = Movie::all();
        return view('catalog.index',
            array(
<<<<<<< HEAD
                'listaPeliculas' => $listaPeliculas
=======
                'arrayPeliculas' => Movie::all()
>>>>>>> bd5381467e6cffbbd7bcba9345b61c5b4db34316
            )
        );
    }

    public function getShow($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show', array(
<<<<<<< HEAD
            'pelicula' => $pelicula,
            'id' => $id,
=======
            'pelicula' => $pelicula
>>>>>>> bd5381467e6cffbbd7bcba9345b61c5b4db34316
        ));
    }

    public function getCreate()
    {

        return view('catalog.create');
    }

    public function getEdit($id)
    {
        $pelicula = Movie::findOrFail($id);
<<<<<<< HEAD
        return view('catalog.edit', array('pelicula'=>$pelicula));
    }

    
=======
        return view('catalog.edit', array(
            'pelicula' => $pelicula
        ));
    }
>>>>>>> bd5381467e6cffbbd7bcba9345b61c5b4db34316
}
