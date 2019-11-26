@extends('layouts.master')

@section('content')

<div class="row">

<div class="col-sm-4">

    <img src="{{$pelicula['poster']}}" alt="poster"></img>

</div>
<div class="col-sm-8">

    <h1>{{$pelicula['title']}}</h1>
    <h2>Año: {{$pelicula['year']}}</h2>
    <h2>Director: {{$pelicula['director']}}</h2>
    <p><strong>Resumen: </strong>{{$pelicula['synopsis']}}</p>

    @if ($pelicula['rented'] == false)
    <p><strong>Estado: </strong>Pelicula disponible</p>

        <a class="btn btn-default" href="#" style="background-color: blue; color: white;">Alquilar pelicula</a>
    @elseif ($pelicula['rented'] == true)
    <p><strong>Estado: </strong>Pelicula actualmente alquilada</p>
        <a class="btn btn-default" href="#" style="background-color: red; color: white;">Devolver pelicula</a>
    @endif
    <a class="btn btn-default" href="#" style="background-color: orange; color: white;">Editar película</a>
    <a class="btn btn-default" href="http://www.videoclub.test/catalog" style="color: black; border: solid black 1px;">Volver al listado</a>

</div>
</div>

@stop
