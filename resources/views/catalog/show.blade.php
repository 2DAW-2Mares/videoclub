@extends('layouts.master')

@section('content')

<div class="row">

    <div class="col-sm-4">

    <img src="{{$id['poster']}}">

    </div>
    <div class="col-sm-8">

    <h2>{{$id['title']}}</h2>
    <h3>Año: {{$id['year']}}</h3>
    <h3>Director: {{$id['director']}}</h3>
    <p><b>Resumen: </b>{{$id['synopsis']}}</p>
    <br>
    <p><b>Estado: </b>@if ($id['rented']) Película alquilada actualmente @else Película disponible @endif</p>
    <br>
        @if ($id['rented']) <button type="button" class="btn btn-danger">Devolver película</button>
        @else <button type="button" class="btn btn-primary">Alquilar película</button>
        @endif
    <button class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Editar película</button>
    <button class="btn btn-default"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Volver al índice</button>
    </div>
</div>


@stop
