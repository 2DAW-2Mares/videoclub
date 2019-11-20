@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
        <div class="card">
            <div class="card-header text-center">
                Modificar pelicula
            </div>
            <div class="card-body" style="padding:30px">

                <form>
                    {{method_field('PUT')}}
                    @csrf

                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="title">Año</label>
                        <input type="text" name="year" id="year" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Director</label>
                        <input type="text" name="director" id="director" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="fecha">Poster</label>
                        <input type="text" name="poster" id="poster" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="fecha">Resumen</label>
                        <textarea name="synopsis" rows="10" cols="50"></textarea>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                            Modificar Pelicula
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@stop
