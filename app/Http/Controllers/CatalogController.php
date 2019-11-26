<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
class CatalogController extends Controller
{

    public function getIndex()
    {
        $pelis=Movie::all();
        return view('catalog.index',array('arrayPeliculas'=>$pelis));
    }

    public function getShow($id){
        $laPeli=Movie::findOrFail($id+1);
        return view('catalog.show',array('id'=>$id),array('arrayPeliculas'=>$laPeli));
    }

    public function getCreate(){
        return view('catalog.create');
    }

    public function getEdit($id){
        $laPeli=Movie::findOrFail($id+1);
        return view('catalog.edit', array('id'=>$id),array('arrayPeliculas'=>$laPeli));
    }
}
