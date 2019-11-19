@extends('layouts.master')

@section('content')

    Vista detalle película {{ $id }}

    <div class="row">

        <div class="col-sm-4">

            {{-- TODO: Imagen de la película --}}

            <img src="{{$pelicula['poster']}}" style="height:200px"/>

        </div>
        <div class="col-sm-8">

            {{-- TODO: Datos de la película --}}

           <h1> {{ $pelicula['title']}}</h1>
           <h2> {{ $pelicula['year']}}</h2>
           <h2> {{ $pelicula['director']}}</h2>
           <p> <b>Resumen:</b>{{ $pelicula['synopsis']}}</p>
           <p><b>Estado: </b>
             @if ($pelicula['rented'] == 1)
                Película actualmente alquilada</p>
                <button class="btn btn-danger">Devolver Película</button>
            @else
                Película disponible</p>
                <button class="btn btn-primary">Alquilar Película</button>
            @endif
                <button class="btn btn-warning">(lapiz) Editar Película</button>
                <button class="btn btn-default">< Volver al listado</button>



        </div>
    </div>

@stop
