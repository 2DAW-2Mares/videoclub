@extends('layouts.app')

@section('content')

    <div class="row">

        @foreach( $arrayPeliculas as $pelicula )
            <div class="col-xs-6 col-sm-4 col-md-3 text-center">

                <a href="{{ url('/catalog/show/' . $pelicula->id ) }}">
                    <img src="{{asset('storage/' . $pelicula->poster)}}" style="height:300px"/>
                    <h4 style="min-height:45px;margin:5px 0 10px 0">
                        {{$pelicula->title}}
                    </h4>
                </a>

            </div>
        @endforeach

    </div>

@stop
