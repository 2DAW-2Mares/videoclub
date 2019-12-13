@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-sm-4">

            <a href="{{ url('/movies' . '/' . $pelicula->id ) }}">
                <img src="{{asset('storage/' . $pelicula->poster)}}" style="height:200px"/>
            </a>

        </div>
        <div class="col-sm-8">

            <h4>{{$pelicula->title}}</h4>
            <h6>A&ntilde;o: {{$pelicula->year}}</h6>
            <h6>Director: {{$pelicula->director}}</h6>
            <p><strong>Resumen:</strong> {{$pelicula->synopsis}}</p>
            <p><strong>Estado: </strong>
                @if($pelicula->rented)
                    Pel&iacute;cula actualmente alquilada.
                @else
                    Pel&iacute;cula disponible.
                @endif
            </p>

            <form action="{{ action('Moviecontroller@changeRented', array('movie' => $pelicula)) }}" method="POST" class="form-group">
                {{method_field('PUT')}}
                @csrf
                <input type="hidden" name="id" value="{{ $pelicula->id }}">

                @if($pelicula->rented)
                <button type="submit" class="btn btn-danger">Devolver pel&iacute;cula</button>
                @else
                <button type="submit" class="btn btn-primary">Alquilar pel&iacute;cula</button>
                @endif
            </form>
            <div class="form-group">
            <a class="btn btn-warning" href="{{ url('/movies' . '/' . $pelicula->id . '/edit' . '/' ) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar pel&iacute;cula</a>
            <a class="btn btn-outline-info" href="{{ action('Moviecontroller@index') }}">Volver al listado</a>
            </div>
            <form action="{{ action('Moviecontroller@destroy', array('movie' => $pelicula)) }}" method="POST">
                @method('delete')
                @csrf
                <button onclick="return confirm('¿Seguro que quieres borrar la película?')" type="submit" class="btn btn-danger">Borrar pel&iacute;cula</button>
            </form>
        </div>
    </div>

@stop
