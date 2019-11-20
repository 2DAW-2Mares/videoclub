@extends('layouts.master')

@section('content')

<div class="row">

<div class="col-sm-4">

<img src="{{$pelicula['poster']}}" style="height:200px"/>

</div>
<div class="col-sm-8">

<h4 style="min-height:45px;margin:5px 0 10px 0">
          {{$pelicula['title']}} <br>
          <br>
          Año:  {{$pelicula['year']}}  <br>
          <br>
          Director:  {{$pelicula['director']}}  <br>
          <br>
          Estado:   <?php if($pelicula['rented']==false)
          { echo "Película disponible"; }
          else{echo "Alquilar película";}  ?>  <br>
          <br>
         Resumen:  {{$pelicula['synopsis']}}  <br> 
         <?php if($pelicula['rented']==false){
                 echo "<button style=background-color:green >Alquilar película</button>";
                }else{
                echo "<button style=background-color:red>Devolver película</button>";        
         }?>
         <a href="http://videoclub.test/catalog" class="btn btn-default btn-lg active" role="button">Volver al listado</a>
       
   
        </h4>


</div>
</div>

@stop
