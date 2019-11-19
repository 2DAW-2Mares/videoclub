@extends('layouts.master')

@section('content')

<div class="row">

<div class="col-sm-4">

<img src="{{$pelicula['poster']}}" style="width:350px; height:auto"></img>

</div>
<div class="col-sm-8">

<h2>{{ $pelicula['title'] }}</h2>
<h5>Año: {{ $pelicula['year'] }}</h5>
<h5>Director: {{ $pelicula['director'] }}</h5>
<p>Resumen: {{ $pelicula['synopsis'] }}</p>
@if ( $pelicula['rented'] )
    <p>Estado: Película actualmente alquilada</p>
    <button type="button" class="btn btn-danger">Devolver película</button>
@else
    <p>Estado: Película disponible</p>
    <button type="button" class="btn btn-primary">Alquilar película</button>
@endif
<button type="button" class="btn btn-warning">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span> Editar película
</button>
<button type="button" class="btn btn-default">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span> Volver al listado
</button>


</div>
</div>


@stop
