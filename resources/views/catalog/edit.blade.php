@extends('layouts.app')

@section('content')

    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Modificar película
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="{{ action('CatalogController@putEdit') }}" method="POST">

                        {{method_field('PUT')}}

                        @csrf
                        <input type="hidden" name="id" value="{{ $pelicula->id }}">

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
                            <input type="url" name="poster" placeholder="url del poster" value="{{ $pelicula->poster }}">
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
