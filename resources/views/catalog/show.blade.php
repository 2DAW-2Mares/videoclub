@extends('layouts.master')

@section('content')

<div class="row">

    <div class="col-sm-4">
        
        <img src="{{$pelicula['poster']}}" style="height:200px"/>

    </div>
    <div class="col-sm-8">

        <h1>{{$pelicula['title']}}</h1> 
        <h3>{{$pelicula['year']}}</h3>  
        <h3>{{$pelicula['director']}}</h3>   
        <p><strong>Resumen: </strong>{{$pelicula['synopsis']}}</p>

        @if($pelicula['rented'] == true)
        <p><strong>Estado: </strong>Película actualmente alquilada.</p>
        <a class="btn btn-danger">Devolver película</a>
        @elseif($pelicula['rented'] == false)
        <p><strong>Estado: </strong>Película disponible.</p>
        <a class="btn btn-primary">Alquilar película</a>
        @endif
        <a class="btn btn-warning" href = "{{ action('CatalogController@getEdit', array('id'=>$id)) }}">&#x270F Editar película</a>
        <a class="btn btn-default" href = "{{ action('CatalogController@getIndex') }}">Volver al listado</a>
    </div>
</div>

@stop
