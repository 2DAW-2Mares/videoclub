@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-sm-4" style="padding-left:175px">

            <a href="{{ action('MovieController@show', ['movie' => $pelicula] ) }}">
                <img src="{{asset('storage/' . $pelicula->poster)}}" style="height:200px"/>
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

            <form action="{{ action('MovieController@changeRented', ['movie' => $pelicula]) }}" method="POST">
                {{method_field('PUT')}}
                @csrf
                <input type="hidden" name="id" value="{{ $pelicula->id }}">

                @if($pelicula->rented)
                <button type="submit" class="btn btn-secondary">Devolver pel&iacute;cula</button>
                @else
                <button type="submit" class="btn btn-primary">Alquilar pel&iacute;cula</button>
                @endif

                <a class="btn btn-warning" href="{{ action('MovieController@edit', ['movie' => $pelicula] ) }}">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    Editar pel&iacute;cula</a>
                
                <a class="btn btn-outline-info" href="{{ action('MovieController@index') }}">Volver al listado</a>
            </form>
            <form action="{{ action('MovieController@destroy', ['movie' => $pelicula]) }}" method="POST">
                {{method_field('DELETE')}}
                @csrf                
                <button type="submit" onclick="return confirm('¿Seguro que desea eliminar ésta película?')" class="btn btn-danger">Eliminar película</button>
            </form>
        </div>
    </div>

@stop
