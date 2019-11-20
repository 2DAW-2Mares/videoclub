@extends('layouts.master')

@section('content')


    <div class="row">

    <div class="col-sm-4">

      <img src="{{$arrayPeliculas['poster']}}" alt="">

    </div>
    <div class="col-sm-8">
        <h2>{{ $arrayPeliculas['title']}}</h2>
        <h4>Año: {{ $arrayPeliculas['year']}}</h4>
        <h4>Director: {{ $arrayPeliculas['director']}}</h4>
        <br>
        <p><b>Resumen:</b> {{ $arrayPeliculas['synopsis']}}</p>
        <p><b>Estado: </b><?php if ($arrayPeliculas['rented']): ?>
          Película actualmente alquilada
        <?php else:?>
          Película disponible
         <?php endif; ?></p>
         <br>
         <?php if ($arrayPeliculas['rented']): ?>
           <button type="button" name="button" class="btn btn-danger">Devolver película</button>
         <?php else: ?>
           <button type="button" name="button" class="btn btn-primary">Alquilar película</button>
         <?php endif; ?>
         <button type="button" name="button" class="btn btn-warning">Editar película</button>
         <button type="button" name="button" class="btn btn-default">Volver a inicio</button>
    </div>
</div>
@stop
