@extends('layouts.app')

@section('content')
@include('partials.flash-message')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Modificar película
                </div>
                <div class="card-body" style="padding:30px">

                   <form action="{{ action('MovieController@update', ['movie' => $pelicula]) }}" method="POST" enctype="multipart/form-data">
                        {{method_field('PUT')}}

                        @csrf

                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $pelicula->title }}">
                        </div>

                        <div class="form-group">
                            <input type="number" min="1900" max="2030" name="year" placeholder="A&ntilde;o" value="{{ $pelicula->year }}">
                        </div>

                        <div class="form-group">
                            <input type="text" name="director" placeholder="Director" value="{{ $pelicula->director }}">
                        </div>

                        <div class="form-group">
                            @if ( strpos($pelicula->poster, 'http') !==false )
                            <div><img src="{{ $pelicula->poster }}" style="height:200px"/></div>
                            @else
                            <div><img src="{{ asset('storage/' . $pelicula->poster) }}" style="height:200px"/></div>
                            @endif

                            <label for="posterURL">Seleccionar nueva imagen del poster desde internet:</label><br>
                            <input type="text" id="posterURL" name="posterURL" placeholder="URL de la imagen"><br>
                            <label for="posterURL">Seleccionar nueva imagen del poster desde tu equipo:</label><br>
                            <input type="file" id="poster" name="poster">
                        </div>


                        <div class="form-group">
                            <label for="synopsis">Resumen</label>
                            <textarea name="synopsis" id="synopsis" class="form-control" rows="3">{{ $pelicula->synopsis }}</textarea>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Modificar película
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@stop
