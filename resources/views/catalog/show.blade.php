@extends('layouts.master')

@section('content')

    <div class="row">

        <div class="col-sm-4">

            {{-- <img src="{{ $id['poster'] }}"> --}}
            <img src="https://m.media-amazon.com/images/M/MV5BMTM5MzExYjAtMjY3MS00MWYyLTlmZDItMWQzNjU5NDMxNGFkXkEyXkFqcGdeQXVyNzYzMjEyMjc@._V1_UX182_CR0,0,182,268_AL_.jpg">

        </div>
        <div class="col-sm-8">

            {{-- READY: Datos de la película --}}
            <h1>{{ $id['title'] }}</h1>
            <h4>Año: {{ $id['year'] }}</h4>
            <h4>Director: {{ $id['director'] }}</h4>
            <p>
                <strong>Resumen:</strong>
                {{ $id['synopsis'] }}
            </p>

            @if($id['rented'])
                <p><strong>Estado:</strong> Película actualmente alquilada.
                </p>
            <button type="button" class="btn btn-danger">Devolver película</button>
            @else
                <p><strong>Estado:</strong> Película disponible.
                </p>
                <button type="button" class="btn btn-primary">Alquilar Película</button>
            @endif
            {{-- TODO: Iconos botones --}}
            <button type="button" class="btn btn-warning">Editar Película</button>
            <button type="button" class="btn btn-default" onclick="window.location.href='http://videoclub.test/'">Volver al listado</button>
        </div>
    </div>

@stop
