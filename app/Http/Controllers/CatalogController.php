<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller {
    public function getIndex() {

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

    public function getShow($id) {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show', array(
            'pelicula' => $pelicula,
        ));
    }

    public function getCreate() {
        return view('catalog.create');
    }

    public function postCreate(Request $request) {
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
        return redirect(action('CatalogController@getIndex'));
    }

    public function getEdit($id) {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', array(
            'pelicula' => $pelicula,
        ));
    }

    public function putEdit(Request $request) {
        $pelicula = Movie::findOrFail($request->input('id'));
        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');
        if ($request->exists('poster')) {
            $posterAnterior = $pelicula->poster;
            $pelicula->poster = Storage::disk('public')->putFile('posters', $request->file('poster'));
        } else if ($request->exists('posterURL')) {
            $this->importarPoster($pelicula, $request->input('posterURL'));
        }
        $pelicula->synopsis = $request->input('synopsis');
        if ($pelicula->save() && isset($posterAnterior)) {
            $this->borraPosterAnterior($posterAnterior);
        }

        return redirect(action('CatalogController@getShow', ['id' => $pelicula->id]));
    }

    public function changeRented(Request $request) {

        $pelicula = Movie::findOrFail($request->id);
        $pelicula->rented = !$pelicula->rented;
        $pelicula->save();

        return redirect()->action('CatalogController@getShow', ['id' => $request->id]);
    }

    private function importarPoster($pelicula, $url) {
        $posterOriginal = $pelicula->poster;
        $pelicula->poster = $url;
        $file_headers = @get_headers($pelicula->poster);
        if ($file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
            if (getimagesize($pelicula->poster)) {
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
