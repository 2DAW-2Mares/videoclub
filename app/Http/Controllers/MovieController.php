<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
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
        $validado = $request->validate([
            'title' => 'bail|required',
            'year' => 'bail|required',
            'director' => 'bail|required',
            'poster' => 'nullable',
            'synopsis' => 'nullable'
        ]);

        if($validado){
            $pelicula = new Movie();
            $pelicula->title = $request->input('title');
            $pelicula->year = $request->input('year');
            $pelicula->director = $request->input('director');
            $this->guardaPoster($request,$pelicula);
            $pelicula->rented = false;
            $pelicula->synopsis = $request->input('synopsis');
            $pelicula->save();
            $rtn = redirect(action('MovieController@index'))->with('success','Pelicula creada correctamente!');
        } else {
            $rtn = redirect(action('MovieController@create'))->with('error','Error al crear la pelicula, compruebe el formulario!');
        }
        return $rtn;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //$pelicula = Movie::findOrFail($id);
        return view('catalog.show', array(
            'pelicula' => $movie
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('catalog.edit', array(
            'pelicula' => $movie
        ));
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

        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');

        $this->guardaPoster($request,$movie);

        $movie->synopsis = $request->input('synopsis');
        $movie->save();

        return redirect()->action('MovieController@show', ['movie' => $movie])->with('success','Pelicula actualizada correctamente!');
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
        Storage::disk('public')->delete($movie->poster);
        return redirect()->action('MovieController@index')->with('success','Pelicula eliminada correctamente!');
    }

    public function changeRented(Movie $movie) {
        $movie->rented = !$movie->rented;
        $movie->save();
        return redirect()->action('MovieController@show', ['movie' => $movie]);
    }

    public function guardaPoster($request,$movie){
        if ($request->exists('poster') && !is_null($request->poster)) {
            if($this->compruebaImagen($request->file('poster')->getMimeType())) {
                $movie->poster = Storage::disk('public')->putFile('posters', $request->file('poster'));
            }
        } elseif ($request->exists('posterURL')&& !is_null($request->posterURL)) {
            if($this->compruebaImagenURL($request->posterURL)) {
                $this->guardaImagen($request,$movie);
            }
        }
    }

    public function compruebaImagen($type){
        $rtn = false;
        $rtn = $this->compruebaTipo($type);
        return $rtn;
    }

    public function compruebaImagenURL($url) {
        $rtn = false;
        $url_headers=get_headers($url, 1);
        if(isset($url_headers['Content-Type'])) {
            $type=strtolower($url_headers['Content-Type']);
            $rtn = $this->compruebaTipo($type);
        }
        return $rtn;
    }

    public function compruebaTipo($type){
        $rtn = false;
        $valid_image_type=array();
        $valid_image_type['image/png']='';
        $valid_image_type['image/jpg']='';
        $valid_image_type['image/jpeg']='';
        $valid_image_type['image/jpe']='';
        $valid_image_type['image/gif']='';
        $valid_image_type['image/tif']='';
        $valid_image_type['image/tiff']='';
        $valid_image_type['image/svg']='';
        $valid_image_type['image/ico']='';
        $valid_image_type['image/icon']='';
        $valid_image_type['image/x-icon']='';
        if(isset($valid_image_type[$type])){
            $rtn = true;
        }
        return $rtn;
    }

    public function guardaImagen($request,$movie){
        $rutaImagenActual = $movie->poster;
        $url = $request->posterURL;
        $extension = substr($url, -4);
        $filename = 'posters/' . uniqid(rand(), true) . $extension;
        if(Storage::disk('public')->put($filename, file_get_contents($url))){
            $movie->poster = $filename;
            Storage::disk('public')->delete($rutaImagenActual);
        };
    }
}
