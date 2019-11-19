@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
        <div class="card">
            <div class="card-header text-center">
            Modificar película
            </div>
        <div class="card-body" style="padding:30px">

            <form action="#" method="POST">
                {{method_field('PUT')}}
            @csrf

            <div class="form-group">
                <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" value="{{$id['title']}}">
            </div>

            <div class="form-group">
                <label for="title">Año</label>
                <input type="number" name="year" id="year" class="form-control" value="{{$id['year']}}">
            </div>

            <div class="form-group">
                <label for="title">Director</label>
                <input type="text" name="director" id="director" class="form-control" value="{{$id['director']}}">
            </div>

            <div class="form-group">
                <label for="title">Imagen</label>
                <input type="file" name="poster" id="poster" class="form-control">
            </div>

            <div class="form-group">
                <label for="synopsis">Resumen</label>
                <textarea name="synopsis" id="synopsis" class="form-control" rows="3">{{$id['synopsis']}}</textarea>
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
