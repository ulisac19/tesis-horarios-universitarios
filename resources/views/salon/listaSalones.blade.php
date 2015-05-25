<?php
use App\Models\Tiposalon;
?>
@extends('layouts.uikit')

@section('head')
<title>Listas de salones</title>
@stop

@section('content')
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-1-1">
        <h1 class="uk-h1">Listas de salones</h1>
       <blockquote>Lista de salones cargados</blockquote>
    </div>
</div>
<br>
<table id="tabla" class="display uk-table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Tipo Salon</th>
            <th>Administrar</th>
        </tr>
    </thead>
 
    <tfoot>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Tipo Salon</th>
            <th>Administrar</th>
        </tr>
    </tfoot>
 
    <tbody>
        @foreach ($cursor as $item)       
            <tr>
                <td>{{$item->nombre}}</td>
                <td>{{$item->descripcion}}</td>
                <td>{{Tiposalon::getTiposalon($item->tipoSalon_id)}}</td>
                <td><button onclick="location.href='{{URL::route('verSalon',array('id'=>$item->id))}}'" class="uk-button uk-button-primary"><i class="uk-icon-eye"></i></button> <button onclick="location.href='{{URL::route('editarSalon',array('id'=>$item->id))}}'" class="uk-button uk-button-success"><i class="uk-icon-pencil"></i></button> <button class="uk-button uk-button-danger" onclick="UIkit.modal.confirm('¿esta seguro?', function(){ location.href='{{URL::route('eliminarSalon',array('id'=>$item->id))}}';});"><i class="uk-icon-trash"></i></button></td>
            </tr>
        @endforeach
        
  
    </tbody>
</table>
<div class="uk-modal"  id="modalListaSalones">    
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
        <div class="uk-modal-header"><h3> Lista Porfesores - Ayuda</h3></div>
        Aqui yo explicare como usar esta interfaz 
        <div class="uk-modal-footer"></div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#tabla').dataTable();
});
</script>
@stop

@section('submenu')
<li class="uk-active"><a href="#"><i class="uk-icon-bars"></i> Lista de salon</a></li>
<li class="uk-nav-header">Operaciones</li>
<li><a href="{{URL::to('cargarSalon')}}"><i class="uk-icon-plus"></i> Cargar salon</a></li>                                
<li class="uk-nav-divider"></li>
<li><a data-uk-modal="{target:'#modalListaSalones'}" href="#"><i class="uk-icon-question-circle"></i> Ayuda</a></li>
@stop


