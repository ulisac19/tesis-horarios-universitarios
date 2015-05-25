<?php 
use App\Models\Tiposalon;
?>
@extends('layouts.uikit')

@section('head')
<title>Ver Salon</title>
<style type="text/css">
.tm-article-subtitle {
    padding-left: 6px;
    border-left: 3px solid #1FA2D6;
    font-size: 16px;
    line-height: 16px;
}
</style>
@stop

@section('content')
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-1-1">
        <h1 class="uk-h1">Salon <span class="uk-text-success">{{$cursor->nombre}}</span> </h1>
       <blockquote>Ver datos del salon</blockquote>
    </div>
</div>

<div class="uk-grid">
    <div class="uk-width-1-1">

        <div class="uk-grid">
            <div class="uk-grid uk-width-1-1">
                <div class="uk-width-2-6">
                    <h2 class="tm-article-subtitle">Nombre</h2>
                    <blockquote>
                        <p>{{$cursor->nombre}}</p>
                    </blockquote>
                </div>
                <div class="uk-width-3-6">
                    <h2 class="tm-article-subtitle">Descripcion</h2>
                    <blockquote>
                        <p>{{$cursor->descripcion}}</p>
                    </blockquote>
                </div>  
               <div class="uk-width-1-6">
                    <h2 class="tm-article-subtitle">Tipo Salon</h2>
                    <blockquote>
                        <p>{{Tiposalon::getTiposalon($cursor->tipoSalon_id)}}</p>
                    </blockquote>
                </div>  
                
            </div>
        </div>

    </div>
</div>

<div class="uk-modal"  id="modalVersalon">    
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
        <div class="uk-modal-header"><h3>Ver salon - Ayuda</h3></div>
        Aqui yo explicare como usar esta interfaz
        <div class="uk-modal-footer"></div>
    </div>
</div>

@stop

@section('submenu')
<li class="uk-active"><a href="#"><i class="uk-icon-eye"></i> Ver salon</a></li>                                
<li><a href="#" onclick="location.href='{{URL::route('editarSalon',array('id'=>$cursor->id))}}'"><i class="uk-icon-pencil"></i> Editar profesor</a></li>                                     
<li><a href="#" onclick="UIkit.modal.confirm('¿esta seguro?', function(){ location.href='{{URL::route('eliminarSalon',array('id'=>$cursor->id))}}';});"><i class="uk-icon-trash"></i> Eliminar profesor</a></li>                                
<li class="uk-nav-header">Operaciones</li>
<li><a href="{{URL::to('cargarSalon')}}"><i class="uk-icon-plus"></i> Cargar salon</a></li>                                
<li><a href="{{URL::to('listaSalones')}}"><i class="uk-icon-bars"></i> Lista de salones</a></li>
<li class="uk-nav-divider"></li>
<li><a data-uk-modal="{target:'#modalVersalon'}" href="#"><i class="uk-icon-question-circle"></i> Ayuda</a></li>
@stop


