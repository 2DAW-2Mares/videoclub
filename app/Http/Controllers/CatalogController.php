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

    public function getEdit($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', array(
            'pelicula' => $pelicula,
        ));
    }

    public function postCreate(Request $request) {
        $m = new Movie;
            $m->title = $request->title;
            $m->year = $request->year;
            $m->director = $request->director;
            $m->poster = $request->poster;
            $m->synopsis = $request->synopsis;
        $m->save();
        return redirect(action('CatalogController@getIndex'));
    }

    public function putEdit(Request $request) {

        $id = $request->identificacion;

        $m = Movie::findOrFail($id);
            $m->title = $request->title;
            $m->year = $request->year;
            $m->director = $request->director;
            $m->poster = $request->poster;
            $m->synopsis = $request->synopsis;
        $m->save();
        return redirect()->action('CatalogController@getShow',[$id]);
    }
}
