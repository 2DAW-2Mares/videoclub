<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $peliculas = Movie::all();
        foreach ($peliculas as $pelicula) {
            if (substr($pelicula->poster, 0, 4) == "http") {
                $this->importarPoster($pelicula, $pelicula->poster);
            }
        }
        return view('catalog.index',
            array(
                'arrayPeliculas' => Movie::all(),
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('catalog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $pelicula = new Movie();
        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');
        if ($request->exists('poster')) {
            $pelicula->poster = Storage::disk('public')->putFile('posters', $request->file('poster'));
        } else if ($request->exists('posterURL')) {
            $this->importarPoster($pelicula, $request->input('posterURL'));
        }
        $pelicula->rented = false;
        $pelicula->synopsis = $request->input('synopsis');
        $pelicula->save();
        return redirect(action('MovieController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie) {
        return view('catalog.show', array(
            'pelicula' => $movie,
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie) {
        return view('catalog.edit', array(
            'pelicula' => $movie,
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie) {
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        if ($request->exists('poster')) {
            $posterAnterior = $movie->poster;
            $movie->poster = Storage::disk('public')->putFile('posters', $request->file('poster'));
        } else if ($request->exists('posterURL')) {
            $this->importarPoster($movie, $request->input('posterURL'));
        }
        $movie->synopsis = $request->input('synopsis');
        if ($movie->save() && isset($posterAnterior)) {
            $this->borraPosterAnterior($posterAnterior);
        }

        return redirect(action('MovieController@show', ['movie' => $movie]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie) {
        $movie->delete();
        $this->borraPosterAnterior($movie->poster);
        return view('catalog.index',
            array(
                'arrayPeliculas' => Movie::all(),
            )
        );
    }

    public function changeRented(Request $request, Movie $movie) {
        $movie->rented = !$movie->rented;
        $movie->save();

        return redirect()->action('MovieController@show', ['movie' => $movie]);
    }

    private function importarPoster($pelicula, $url) {
        $posterOriginal = $pelicula->poster;
        $pelicula->poster = $url;
        $file_headers = @get_headers($pelicula->poster);
        if ($file_headers && $file_headers[0] == 'HTTP/1.1 200 OK') {
            if (getimagesize($pelicula->poster)) {
                echo "Actualiza";
                $uid = uniqid();
                Storage::disk('public')->put('posters/' . $uid . '.jpg', file_get_contents($pelicula->poster));
                $pelicula->poster = 'posters/' . $uid . '.jpg';
                if ($pelicula->save()) {
                    $this->borraPosterAnterior($posterOriginal);
                }
            }
        }
    }

    private function borraPosterAnterior($poster) {
        Storage::disk('public')->delete($poster);
    }
}
