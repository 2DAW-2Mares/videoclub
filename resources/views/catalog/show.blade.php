@extends('layouts.master')

@section('content')

<div class="row">

    <div class="col-sm-4">

        <img src="{{$pelicula['poster']}}" style="height:200px"/>

    </div>
    <div class="col-sm-8">

        <h4 style="min-height:45px;margin:5px 0 10px 0">
            {{$pelicula['title']}}
        </h4>
        <h5>
            Año: {{$pelicula['year']}}
        </h5>
        <h5>
            Director: {{$pelicula['director']}}
        </h5>
        <p>
            <b>Resumen:</b> {{$pelicula['synopsis']}}
        </p>
        <p><strong>Estado: </strong>
            @if($pelicula['rented'])
            Pelicula actualmente alquilada
            <button class="btn btn-danger">Devolver Pelicula</button>
            @else
            Pelicula disponible
            <button class="btn btn-primary">Película disponible</button>
            @endif
        </p>
        <a class="btn btn-warning" href="{{ url('/catalog/edit/'.$id) }}">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        Editar peliula</a>
        <a class="btn btn-outline-info" href="{{ url('/catalog') }}">Volver al listado</a>

    </div>
</div>

@stop
