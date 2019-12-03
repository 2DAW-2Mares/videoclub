<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class CatalogController extends Controller
{
    public function getIndex()
    {
        return view('catalog.index',
            array(
                'arrayPeliculas' => Movie::all()
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

    public function postCreate(Request $request)
    {
        $pelicula = new Movie();
        $pelicula ->title = $request->title;
        $pelicula ->year = $request->year;
        $pelicula ->director = $request->director;
        $pelicula ->poster = $request->poster;
        $pelicula ->synopsis = $request->synopsis;
        $pelicula->save();
        return redirect('/catalog');
    }

    public function getEdit($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', array(
            'pelicula' => $pelicula
        ));
    }

    public function putEdit(Request $request,$id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula ->title = $request->title;
        $pelicula ->year = $request->year;
        $pelicula ->director = $request->director;
        $pelicula ->poster = $request->poster;
        $pelicula ->synopsis = $request->synopsis;
        $pelicula->save();
        return redirect('/catalog.peliculaEditada');
        //return view('sumaResultado', array('sumando1' => $request->input('sumando1'),'sumando2' => $request->input('sumando2')));
    }
}
