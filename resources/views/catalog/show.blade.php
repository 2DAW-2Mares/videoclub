@extends('layouts.master')

@section('content')

    <div class="row">

    <div class="col-sm-4">

        <img src="{{$pelicula['poster']}}" style="height:300px">

    </div>
    <div class="col-sm-8">

        <h1>{{$pelicula['title']}}</h1>
        <h1>{{$pelicula['year']}}</h1>
        <h1>{{$pelicula['director']}}</h1>
    <p><b>Resumen</b>{{$pelicula['synopsis']}}</p>
    <p><b>Estado</b></p>
    @if ($pelicula['rented']==1)
    Pelicula actualmente alquilada</p>
    <button class="btn btn-danger">Devolver Pelicula</button>
    @else
    Pelicula disponible</p>
    <button class="btn btn-primary">Alquilar Pelicula</button>
    @endif
    <button class="btn btn-warning">Editar Pelicula</button>
    <button class="btn btn-default">Volver al listado</button>

    </div>
</div>

@stop
