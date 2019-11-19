@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
       <div class="card">
          <div class="card-header text-center">
             Añadir película
          </div>
          <form>
          <div class="card-body" style="padding:30px">

             {{-- TODO: Abrir el formulario e indicar el método POST --}}

             {{-- TODO: Protección contra CSRF --}}

             <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control">
             </div>

             <div class="form-group">
                {{-- TODO: Completa el input para el año --}}
                <label for="title">Año</label>
                <input type="text" name="ano" id="ano" class="form-control">
             </div>

             <div class="form-group">
                {{-- TODO: Completa el input para el director --}}
                <label for="title">Director</label>
                <input type="text" name="director" id="director" class="form-control">
             </div>

             <div class="form-group">
                {{-- TODO: Completa el input para el poster --}}
                <label for="title">Poster</label>
                <input type="text" name="poster" id="poster" class="form-control">
             </div>

             <div class="form-group">
                <label for="synopsis">Resumen</label>
                <textarea name="synopsis" id="synopsis" class="form-control" rows="3"></textarea>
             </div>

             <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                    Añadir película
                </button>
             </div>
            </form>
             {{-- TODO: Cerrar formulario --}}

          </div>
       </div>
    </div>
 </div>


@stop
