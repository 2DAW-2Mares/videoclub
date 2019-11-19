@extends('layouts.master')

@section('content')

<div class="row">

    <div class="col-sm-4">

        {{-- TODO: Imagen de la película --}}
        <img src="{{$pelicula['poster']}}" style="height:580px"/>

    </div>
    <div class="col-sm-8">

        {{-- TODO: Datos de la película --}}
        <h1 style="min-height:45px; margin-left:15%;">
            {{$pelicula['title']}}
        </h1>
        <h2 style="min-height:45px; margin-left:15%;">
            Año: {{$pelicula['year']}}
        </h2>
        <h2 style="min-height:45px; margin-left:15%;">
            Director: {{$pelicula['director']}}
        </h2>
        <p style="margin-left:15%;">
        <strong>Resumen: </strong> {{$pelicula['synopsis']}}
        </p>

        @if ($pelicula['rented'] == false)
        <p style="margin-left:15%;"><strong>Estado: </strong>Pelicula actualmente disponible</p>
        <button style="background-color:green; margin-left:15%;">Disponible para alquilar</button>
        @endif
        @if ($pelicula['rented'] == true)
        <p style="margin-left:15%;"><strong>Estado: </strong>Pelicula actualmente alquilada</p>
        <button style="background-color:red; margin-left:15%;">Devolver Película</button>
        @endif

        <button style="background-color:orange; margin-left:2%;">Editar película</button>
        <button style="background-color:gray; margin-left:2%;">< Volver al listado</button>

    </div>
</div>

@stop
