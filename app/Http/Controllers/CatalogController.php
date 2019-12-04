<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Illuminate\Support\Facades\Storage;

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
        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');
        $pelicula->poster = $request->input('poster');
        $pelicula->rented = false;
        $pelicula->synopsis = $request->input('synopsis');
        $pelicula->save();
        return redirect(action('CatalogController@getIndex'));
    }

    public function getEdit($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', array(
            'pelicula' => $pelicula
        ));
    }

    public function putEdit(Request $request)
    {
        $pelicula = Movie::findOrFail($request->input('id'));
        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');
        if($request->exists('poster')) {
            $pelicula->poster = Storage::disk('public')->putFile('posters', $request->file('poster'));
        }
        $pelicula->synopsis = $request->input('synopsis');
        $pelicula->save();

        return redirect(action('CatalogController@getShow', ['id' => $pelicula->id]));
    }

    public function changeRented(Request $request) {

        $pelicula = Movie::findOrFail($request->id);
        $pelicula->rented = !$pelicula->rented;
        $pelicula->save();

        return redirect()->action('CatalogController@getShow', ['id' => $request->id]);
    }
}
