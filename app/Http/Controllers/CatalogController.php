<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $this->guardaPelicula($pelicula,$request);
        return redirect(action('CatalogController@getIndex'));
    }

    public function getEdit($id) {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', array(
            'pelicula' => $pelicula
        ));
    }

    public function putEdit(Request $request) {
        $pelicula = Movie::findOrFail($request->input('id'));
        $this->guardaPelicula($pelicula,$request);
        return redirect(action('CatalogController@getShow', ['id' => $pelicula->id]));
    }

    public function changeRented(Request $request) {
        $pelicula = Movie::findOrFail($request->id);
        $pelicula->rented = !$pelicula->rented;
        $pelicula->save();
        return redirect()->action('CatalogController@getShow', ['id' => $request->id]);
    }

    public function guardaPelicula($pelicula,$request){
        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');

        if ($request->exists('poster')) {
            if($this->compruebaImagen($request->file('poster')->getMimeType())) {
                $pelicula->poster = Storage::disk('public')->putFile('posters', $request->file('poster'));
            }
        } elseif ($request->exists('posterURL')) {
            if($this->compruebaImagenURL($request->posterURL)) {
                $pelicula->poster = $request->posterURL;
            }
        }

        $pelicula->synopsis = $request->input('synopsis');
        $pelicula->save();
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
}


