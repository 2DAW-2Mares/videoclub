@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-sm-4">

            <a href="{{ url('/movie/show/' . $pelicula->id ) }}">
                <img src="{{$pelicula->poster}}" style="height:200px"/>
            </a>

        </div>
        <div class="col-sm-8">

            <h4>{{$pelicula->title}}</h4>
            <h6>A&ntilde;o: {{$pelicula->year}}</h6>
            <h6>Director: {{$pelicula->director}}</h6>
            <p><strong>Resumen:</strong> {{$pelicula->synopsis}}</p>
            <p><strong>Estado: </strong>
                @if($pelicula->rented)
                    Pel&iacute;cula actualmente alquilada.
                @else
                    Pel&iacute;cula disponible.
                @endif
            </p>

            <form action="{{ action('MovieController@changeRented' , array('movie' => $pelicula)) }}" method="POST">
                {{method_field('PUT')}}
                @csrf
                <input type="hidden" name="id" value="{{ $pelicula->id }}">

                @if($pelicula->rented)
                <button type="submit" class="btn btn-danger">Devolver pel&iacute;cula</button>
                @else
                <button type="submit" class="btn btn-primary">Alquilar pel&iacute;cula</button>
                @endif

                <a class="btn btn-warning" href="{{ action('MovieController@edit' , array('movie' => $pelicula)), '/edit'  }}">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    Editar pel&iacute;cula</a>
                <a class="btn btn-outline-info" href="{{ action('MovieController@index') }}">Volver al listado</a>
                </form>

                <form action="{{ action('MovieController@destroy' , array('movie' => $pelicula)) }}" method="POST">
                    {{method_field('DELETE')}}
                    @csrf
                    <button type="submit" class="btn btn-danger">Borrar pel&iacute;cula</button>
                </form>

        </div>
    </div>

@stop
