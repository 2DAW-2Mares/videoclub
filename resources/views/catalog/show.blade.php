@extends('layouts.master')

@section('content')

<div class="row">

    <div class="col-sm-4">
        
    <img src={{$arrayPeliculas['poster']}} alt="sd">

    </div>
    <div class="col-sm-8">

    <h1>{{$arrayPeliculas['title']}}</h1>
    <h3>Año :  {{$arrayPeliculas['year']}}</h2>
    <h3>Director : {{$arrayPeliculas['director']}}</h3>

    <br>

    <p><b>Resumen :</b> {{$arrayPeliculas['synopsis']}} </p>
    <br>
        
    @if($arrayPeliculas['rented'] == true)
    <p><b>Estado:</b>Pelicula actualmente alquilada</p>
        <button class="btn btn-danger">Devoler Pelicula</button>
        @endif

        @if($arrayPeliculas['rented'] == false)
        <p><b>Estado:</b>Pelicula disponible</p>
        <button class="btn btn-primary">Alquilar Pelicula</button>
        @endif
        <a href="../../catalog/create/{{$id}}" class="btn btn-warning">Editar Pelicula</a>
        <a href="../../catalog/" class="btn btn-outline-dark">Volver al listado</a>
        



    </div>
</div>



@stop
