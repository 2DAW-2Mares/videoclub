@extends('layouts.app')

@section('content')
    <div class="row" style="margin-bottom:20px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Buscar película
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="{{ action('CatalogController@getIndex') }}" method="POST">

                        @csrf

                        <div class="form-group">
                            <input type="text" name="busqueda" id="busqueda" class="form-control" value="" placeholder="Escriba el texto a buscar en el título">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Buscar
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        @foreach( $arrayPeliculas as $pelicula )
            <div class="col-xs-6 col-sm-4 col-md-3 text-center">

                <a href="{{ url('/catalog/show/' . $pelicula->id ) }}">
                    <img src="{{$pelicula->poster}}" style="height:200px"/>
                    <h4 style="min-height:45px;margin:5px 0 10px 0">
                        {{$pelicula->title}}
                    </h4>
                </a>

            </div>
        @endforeach

    </div>

@stop
