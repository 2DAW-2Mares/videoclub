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
       $pelicula = new Movie;

        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');
        $pelicula->poster = $request->input('poster');
        $pelicula->rented = 0;
        $pelicula->synopsis = $request->input('synopsis');
        
        $pelicula->save();

        return redirect()->action('CatalogController@getIndex', 'catalog');
    }

    public function putEdit(Request $request){
        $pelicula = Movie::findOrFail($request->input('id'));

        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');
        $pelicula->poster = $request->input('poster');
        $pelicula->rented = 0;
        $pelicula->synopsis = $request->input('synopsis');
        
        $pelicula->save();
        
        $id = $request->input('id');
        
        return redirect()->action('CatalogController@getShow', $id);

    }


    public function getEdit($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', array(
            'pelicula' => $pelicula
        ));
    }


public function getHome(){

    
}

}
