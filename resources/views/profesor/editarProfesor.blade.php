<?php
use App\Models\Departamento;
?>
@extends('layouts.uikit')

@section('head')
<title>Editar datos Profesor </title>
@stop

@section('content')
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-1-1">
        <h1 class="uk-h1">Editar profesor: <span class="uk-text-success">{{$cursor->nombre}}</span> </h1>
       <blockquote>Edtiar datos del profesor</blockquote>
    </div>
</div>
<br>
<div class="uk-grid">
    <div class="uk-width-1-1">
		{!! Form::open(array(
                    'action' => 'ProfesorController@editarProfesor',
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
                        {!! Form::label('cedula') !!}<em class="uk-text-danger">*</em> 
                        {!! Form::input('text', 'cedula', $cursor->cedula, array('class'=>'uk-width-1-1 uk-form-success', 'placeholder'=>'', 'autocomplete' =>'off')) !!} 
                        {!! '<em class="uk-text-danger">'.$errors->first('cedula').'</em>' !!}  
                        <span id="_mejora_aceptable"></span>
                    </div>   
                    <div class="uk-width-1-3">    
                    {!! Form::label('departamento') !!}<em class="uk-text-danger">*</em>            
                    {!! Form::select('departamento_id', Departamento::all()->lists('nombre', 'id'), Input::old('departamento_id'), array('class'=>'uk-width-1-1 uk-form-success' )) !!}
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
        {!! Form::hidden('editarProfesor') !!}
        {!! Form::hidden('id', $cursor->id) !!}     
        {!! Form::close() !!}
    </div>    
</div>
<div class="uk-modal"  id="modalProfesores">    
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
        <div class="uk-modal-header"><h3>Editar profesor - Ayuda</h3></div>
        Aqui yo explicare como usar esta interfaz 
        <div class="uk-modal-footer"></div>
    </div>
</div>
@stop

@section('submenu')
<li class="uk-active"><a href="#"><i class="uk-icon-pencil"></i> Editar profesor</a></li>                                     
<li><a href="#" onclick="location.href='{{URL::route('verProfesor',array('id'=>$cursor->id))}}'"><i class="uk-icon-eye"></i> Ver profesor</a></li>                                
<li><a href="#" onclick="UIkit.modal.confirm('¿esta seguro?', function(){ location.href='{{URL::route('eliminarProfesor',array('id'=>$cursor->id))}}';});"><i class="uk-icon-trash"></i> Eliminar profesor</a></li>                                

<li class="uk-nav-header">Operaciones</li>
<li><a href="{{URL::to('cargarProfesor')}}"><i class="uk-icon-plus"></i> Cargar profesor</a></li>   
<li><a href="{{URL::to('listaProfesores')}}"><i class="uk-icon-bars"></i> Listas profesores</a></li>
<li class="uk-nav-divider"></li>
<li><a data-uk-modal="{target:'#modalProfesores'}" href="#"><i class="uk-icon-question-circle"></i> Ayuda</a></li>
@stop


