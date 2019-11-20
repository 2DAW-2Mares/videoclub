@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-4">
        {{-- TODO: INICIO Imagen de la película --}}
            <img src="{{$arrayPeliculas[$id]['poster']}}" style="height:200px"/>
   {{-- TODO: FIN Imagen de la película --}}
    </div>
    <div class="col-sm-8">
        {{-- TODO: INICIO Datos de la película 
        título, año, director, resumen y su estado. --}}

        <p style="font-size: 3rem">{{$arrayPeliculas[$id]['title']}} </p>
        <p style="font-size: 1.5rem">Año: {{$arrayPeliculas[$id]['year']}} </p>
        <p style="font-size: 1.5rem">Director: {{$arrayPeliculas[$id]['director']}} </p>
        <p><b>Resumen</b>: {{$arrayPeliculas[$id]['synopsis']}} </p>
        @if ($arrayPeliculas[$id]['rented'] == false)
            <p><b>Estado: </b>Película disponible</p>
            <button type="button" class="btn btn-primary">Alquilar película</button>
        @else
            <p><b>Estado: </b>Película actualmente alquilada</p>
            <button type="button" class="btn btn-link">Devolver película</button>
        @endif
        <a class="btn btn-danger" href="http://www.videoclub.test/catalog/edit/{{$id}}">Editar Película</a>
                <a class="btn btn-info" href="http://www.videoclub.test/catalog">Volver al listado</a>
        

  {{-- TODO: INICIO FIN Datos de la película --}}
    </div>
</div>
@stop
