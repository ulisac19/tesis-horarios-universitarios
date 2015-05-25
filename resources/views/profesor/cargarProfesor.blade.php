<?php 
use App\Models\Departamento;
?>
@extends('layouts.uikit')

@section('head')
<title>Cargar Profesor</title>

@stop

@section('content')

<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-1-1">
        <h1 class="uk-h1">Cargar Profesor</h1>
       <blockquote>Agregar los datos de los profesores</blockquote>
    </div>
</div>
<br>
<div class="uk-grid ">
    <div class="uk-width-1-1">
        {!! Form::open(array(
                    'action' => 'ProfesorController@cargarProfesor',
                    'method' => 'POST',
                    'class' =>  'uk-form',
                    'id' => 'form1'
                            )) 

        !!}             
           
           <div class="uk-grid">
                <div class="uk-grid uk-width-1-1">                    

                    <div class="uk-width-2-6">
                        {!! Form::label('Nombre') !!}<em class="uk-text-danger">*</em>
                        {!! Form::input('text', 'nombre', $cursor->nombre, array('class'=>'uk-width-1-1', 'placeholder'=>'', 'autocomplete' =>'off')) !!}  
                        {!! '<em class="uk-text-danger">'.$errors->first('nombre').'</em>' !!} 
                        <span id="nombre"></span>
                    </div>     
                    <div class="uk-width-2-6">
                        {!! Form::label('cedula') !!}<em class="uk-text-danger">*</em> 
                        {!! Form::input('text', 'cedula', $cursor->cedula, array('class'=>'uk-width-1-1', 'placeholder'=>'', 'autocomplete' =>'off')) !!} 
                        {!! '<em class="uk-text-danger">'.$errors->first('cedula').'</em>' !!}  
                        <span id="_cedula"></span>
                    </div>   
                    <div class="uk-width-1-3">    
                    {!! Form::label('departamento') !!}<em class="uk-text-danger">*</em>            
                    {!! Form::select('departamento_id', Departamento::all()->lists('nombre', 'id'), Input::old('departamento_id'), array('class'=>'uk-width-1-1' )) !!}
                    {!! '<em class="uk-text-danger">'.$errors->first('departamento_id').'</em>' !!}  
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
        {!! Form::hidden('cargarProfesor') !!}     
    
        {!! Form::close() !!}

    </div>    
</div>

@stop

@section('submenu')
<li class="uk-active"><a href="#"><i class="uk-icon-plus"></i> Cargar Profesor</a></li>                                
<li class="uk-nav-header">Operaciones</li>
<li><a href="{{URL::to('listaProfesores')}}"><i class="uk-icon-bars"></i> Lista de profesores</a></li>
<li class="uk-nav-divider"></li>
<li><a data-uk-modal="{target:'#modalCargarMaterias'}" href="#"><i class="uk-icon-question-circle"></i> Ayuda</a></li>
@stop

