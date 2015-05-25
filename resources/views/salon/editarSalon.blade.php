<?php
use App\Models\Tiposalon;
?>
@extends('layouts.uikit')

@section('head')
<title>Editar datos salon</title>
@stop

@section('content')
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-1-1">
        <h1 class="uk-h1">Salon profesor: <span class="uk-text-success">{{$cursor->nombre}}</span> </h1>
       <blockquote>Editar datos del salon</blockquote>
    </div>
</div>
<br>
<div class="uk-grid">
    <div class="uk-width-1-1">
		{!! Form::open(array(
                    'action' => 'SalonController@editarSalon',
                    'method' => 'POST',
                    'class' =>  'uk-form',
                    'id' => 'form1'
                            )) 

        !!}             
           
           <div class="uk-grid">
                <div class="uk-grid uk-width-1-1">                    

                    <div class="uk-width-2-6">
                        {!! Form::label('Nombre') !!}<em class="uk-text-danger">*</em>
                        {!! Form::input('text', 'nombre', $cursor->nombre, array('class'=>'uk-width-1-1 uk-form-success' , 'placeholder'=>'', 'autocomplete' =>'off')) !!}  
                        {!! '<em class="uk-text-danger">'.$errors->first('nombre').'</em>' !!} 
                        <span id="nombre"></span>
                    </div>     
                    <div class="uk-width-2-6">
                        {!! Form::label('descripcion') !!}<em class="uk-text-danger">*</em> 
                        {!! Form::input('text', 'descripcion', $cursor->descripcion, array('class'=>'uk-width-1-1 uk-form-success', 'placeholder'=>'', 'autocomplete' =>'off')) !!} 
                        {!! '<em class="uk-text-danger">'.$errors->first('descripcion').'</em>' !!}  
                        <span id="_mejora_aceptable"></span>
                    </div>   
                    <div class="uk-width-1-3">    
                    {!! Form::label('tipoSalon_id') !!}<em class="uk-text-danger">*</em>            
                    {!! Form::select('tipoSalon_id', Tiposalon::all()->lists('nombre', 'id'), Input::old('tipoSalon_id'), array('class'=>'uk-width-1-1 uk-form-success' )) !!}
                    {!! '<em class="uk-text-danger">'.$errors->first('tipoSalon_id').'</em>' !!}  
                    <span id="_departamento"></span>
                </div>                                 
                </div>                
           </div>
             

            <div class="uk-grid uk-container-center">
                <div class="uk-width-1-3"></div>
                <div class="uk-width-1-3">
                    <button type="submit" class="uk-button uk-button-primary uk-width-4-10" data-uk-button><i class="uk-icon-save"></i> Salvar</button>
                    <button type="button" onclick="location.href='#'" class="uk-button uk-button-danger" data-uk-button><i class="uk-icon-reply"></i> Cancelar</button>
                </div>           
            </div>

        {!! Form::hidden('_token', csrf_token() ) !!}    
        {!! Form::hidden('editarSalon') !!}
        {!! Form::hidden('id', $cursor->id) !!}    
        {!! Form::close() !!}
    </div>    
</div>
<div class="uk-modal"  id="modalSalon">    
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
        <div class="uk-modal-header"><h3>Editar profesor - Ayuda</h3></div>
        Aqui yo explicare como usar esta interfaz 
        <div class="uk-modal-footer"></div>
    </div>
</div>
@stop

@section('submenu')
<li class="uk-active"><a href="#"><i class="uk-icon-pencil"></i> Editar salon</a></li>                                     
<li><a href="#" onclick="location.href='{{URL::route('verSalon',array('id'=>$cursor->id))}}'"><i class="uk-icon-eye"></i> Ver salon</a></li>                                
<li><a href="#" onclick="UIkit.modal.confirm('¿esta seguro?', function(){ location.href='{{URL::route('eliminarSalon',array('id'=>$cursor->id))}}';});"><i class="uk-icon-trash"></i> Eliminar profesor</a></li>                                

<li class="uk-nav-header">Operaciones</li>
<li><a href="{{URL::to('cargarSalon')}}"><i class="uk-icon-plus"></i> Cargar salon</a></li>   
<li><a href="{{URL::to('listaSalon')}}"><i class="uk-icon-bars"></i> Listas salon</a></li>
<li class="uk-nav-divider"></li>
<li><a data-uk-modal="{target:'#modalSalon'}" href="#"><i class="uk-icon-question-circle"></i> Ayuda</a></li>
@stop


