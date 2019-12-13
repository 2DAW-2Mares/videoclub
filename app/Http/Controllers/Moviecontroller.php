<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class Moviecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalog.index',
            array(
                'arrayPeliculas' => Movie::all()
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pelicula = new Movie();
        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');
        if($request->exists('poster')) {
            $pelicula->poster = Storage::disk('public')->putFile('posters', $request->file('poster'));
        }
        $pelicula->rented = false;
        $pelicula->synopsis = $request->input('synopsis');
        $pelicula->save();
        return redirect(action('Moviecontroller@index'))->with('success', 'Película creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        /* $pelicula = Movie::findOrFail($id); */
        return view('catalog.show', array('pelicula' => $movie));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        /* $pelicula = Movie::findOrFail($id); */
        return view('catalog.edit', array('pelicula' => $movie));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        /* $pelicula = Movie::findOrFail($request->input('id')); */
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        if($request->exists('poster')) {
            $movie->poster = Storage::disk('public')->putFile('posters', $request->file('poster'));
        }
        $movie->synopsis = $request->input('synopsis');
        $movie->save();

        return redirect()->action('Moviecontroller@show', array('movie' => $movie))->with('success', 'Película editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect(action('Moviecontroller@index'))->with('success', 'Película eliminada correctamente');
    }

    public function changeRented(Movie $movie) {

        /* $pelicula = Movie::findOrFail($request->id); */
        $movie->rented = !$movie->rented;
        $movie->save();
        return redirect()->action('Moviecontroller@show', array('movie' => $movie));
    }
}
