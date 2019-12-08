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

    public function getEdit($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', array(
            'pelicula' => $pelicula
        ));
    }

    public function putEdit(Request $request)
    {
        $id =$request->input('id');
        $movie = Movie::findOrFail($id);
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        if($request->exists('poster')) {
            $movie->poster = Storage::disk('public')->putFile('posters', $request->file('poster'));
        }
        $movie->synopsis = $request->input('synopsis');
        $movie->save();
        return redirect(action('CatalogController@getShow',$id));
    }
    public function postCreate(Request $request)
    {
        $movie = new Movie;
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');

        if($request->exists('poster')) {
            $movie->poster = Storage::disk('public')->putFile('posters', $request->file('poster'));
        }
        $movie->synopsis = $request->input('synopsis');
        $movie->save();
        return redirect(action('CatalogController@getIndex','catalog'));

    }

    public function peliculaAlquilada(Request $request){
        $pelicula = Movie::findOrFail($request->input('id'));
        $pelicula->rented = $request->input('rented');
        $comprobador = $pelicula->rented = $request->input('rented');
        if ($comprobador == 0) {
            $pelicula->rented = 1;
        }else{
            $pelicula->rented = 0;
        }
        $pelicula->save();
        return redirect(action('CatalogController@getShow', ['id' => $pelicula->id]));
    }




}
