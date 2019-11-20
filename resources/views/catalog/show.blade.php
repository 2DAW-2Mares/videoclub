@extends('layouts.master')

@section('content')

    {{-- Vista detalle película {{ $id }} --}}
    <div class="row">

        <div class="col-sm-4">
        <img src="{{$arrayPeliculas['poster']}}" style="height:200px">

        </div>
        <div class="col-sm-8">
        <h1>{{$arrayPeliculas['title']}}</h1>
        <p>Año: {{$arrayPeliculas['year']}}</p>
        <p>Director: {{$arrayPeliculas['director']}}</p>
        <p>Resumen: {{$arrayPeliculas['synopsis']}}</p>

        @if ($arrayPeliculas['rented'] == true)

        <p> Estado : Pelicula disponible</p>
        <button class="btn btn-primary">Alquilar pelicula</button>
        @elseif ($arrayPeliculas['rented'] == false)
        <p> Estado : Película actualmente alquilada</p>
        <button class="btn btn-danger">Devolver pelicula</button>
        @endif
        <button class="btn btn-warning">Editar pelicula</button>
        <button class="btn btn-default">Volver al listado</button>
        </div>
    </div>
@stop
