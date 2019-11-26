@extends('layouts.master')

@section('content')

<div class="row">

    <div class="col-sm-4">

        <img src={{$arrayPeliculas->poster}}>

    </div>
    <div class="col-sm-8">
    <h1>{{$arrayPeliculas->title}}</h1>
    <h4>Año: {{$arrayPeliculas->year}}</h4>
    <h4>Director: {{$arrayPeliculas->director}}</h4>
    <br>
    <h4>Resumen: </h4><p>{{$arrayPeliculas->synopsis}}</p>
    <h4>Estado:</h4><p>@php if($arrayPeliculas->rented==true) echo "Pelicula actualmete alquilada"; else echo "Pelicula disponible";  @endphp</p>
    <a href="" class="btn btn-danger">Devolver Película</a>
    <a href="/catalog/edit/{{$id+1}}" class="btn btn-success">Editar Película</a>
    </div>
</div>

@stop
