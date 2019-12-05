@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-sm-4">

            <a href="{{ url('/catalog/show/' . $pelicula->id ) }}">
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

            <form action="{{ action('CatalogController@changeRented') }}" method="POST">
                {{method_field('PUT')}}
                @csrf
                <input type="hidden" name="id" value="{{ $pelicula->id }}">

                @if($pelicula->rented)
                <button type="submit" class="btn btn-danger">Devolver pel&iacute;cula</button>
                @else
                <button type="submit" class="btn btn-primary">Alquilar pel&iacute;cula</button>
                @endif

                <a class="btn btn-warning" href="{{ url('/catalog/edit/' . $pelicula->id ) }}">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    Editar pel&iacute;cula</a>
                <a class="btn btn-outline-info" href="{{ action('CatalogController@getIndex') }}">Volver al listado</a>
            </form>
        </div>
    </div>

@stop
