<?php 
use App\Models\Salon;
use App\Models\Tiposalon;
?>
@extends('layouts.uikit')

@section('head')
<title>Cargar salon</title>

@stop

@section('content')

<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-1-1">
        <h1 class="uk-h1">Cargar salon</h1>
       <blockquote>Agregar los datos de los salones</blockquote>
    </div>
</div>
<br>
<div class="uk-grid ">
    <div class="uk-width-1-1">
        {!! Form::open(array(
                    'action' => 'SalonController@cargarSalon',
                    'method' => 'POST',
                    'class' =>  'uk-form',
                    'id' => 'form1'
                            )) 

        !!}             
           
           <div class="uk-grid">
                <div class="uk-grid uk-width-1-1">                    

                    <div class="uk-width-1-6">
                        {!! Form::label('Nombre') !!}<em class="uk-text-danger">*</em>
                        {!! Form::input('text', 'nombre', $cursor->nombre, array('class'=>'uk-width-1-1', 'placeholder'=>'', 'autocomplete' =>'off')) !!}  
                        {!! '<em class="uk-text-danger">'.$errors->first('nombre').'</em>' !!} 
                        <span id="nombre"></span>
                    </div>     
                    <div class="uk-width-4-6">
                        {!! Form::label('descripcion') !!}<em class="uk-text-danger">*</em> 
                        {!! Form::input('text', 'descripcion', $cursor->descripcion, array('class'=>'uk-width-1-1', 'placeholder'=>'', 'autocomplete' =>'off')) !!} 
                        {!! '<em class="uk-text-danger">'.$errors->first('descripcion').'</em>' !!}  
                        <span id="_descripcion"></span>
                    </div>   
                    <div class="uk-width-1-6">    
                    {!! Form::label('Tipo de Salon') !!}<em class="uk-text-danger">*</em>            
                    {!! Form::select('tipoSalon_id', Tiposalon::all()->lists('nombre', 'id'), Input::old('tipoSalon_id'), array('class'=>'uk-width-1-1' )) !!}
                    {!! '<em class="uk-text-danger">'.$errors->first('tipoSalon_id').'</em>' !!}  
                    <span id="_tipoSalon_id"></span>
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
        {!! Form::hidden('cargarSalon') !!}     
    
        {!! Form::close() !!}

    </div>    
</div>

@stop

@section('submenu')
<li class="uk-active"><a href="#"><i class="uk-icon-plus"></i> Cargar Salon</a></li>                                
<li class="uk-nav-header">Operaciones</li>
<li><a href="{{URL::to('listaSalones')}}"><i class="uk-icon-bars"></i> Lista de salones</a></li>
<li class="uk-nav-divider"></li>
<li><a data-uk-modal="{target:'#modalCargarMaterias'}" href="#"><i class="uk-icon-question-circle"></i> Ayuda</a></li>
@stop

