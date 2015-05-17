@extends('layouts.uikit')

@section('head')
<title>Parametros Busqueda Tabu</title>
@stop

@section('content')
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-1-1">
        <h1 class="uk-h1">Parametros Busqueda Tabu</h1>
       <blockquote>Cargar paramatros para ejecutar el algoritmo de busqueda tabu</blockquote>
    </div>
</div>
<br>
<?php 



 ?>
<div class="uk-grid ">
    <div class="uk-width-1-1">
		
        {!! Form::open(array(
                    'action' => 'ParametrosController@tabu',
                    'method' => 'POST',
                    'class' =>  'uk-form',
                    'id' => 'form1'
                            )) 

        !!}			
            <div class="uk-grid">
                <div class="uk-grid uk-width-1-1">
                    <div class="uk-width-2-6">
                        {!! Form::label('nombre') !!}<em class="uk-text-danger">*</em>    
                        {!! Form::input('text', 'nombre', Input::old('nombre') , array('class'=>'uk-width-1-1', 'autocomplete' =>'off')) !!}
                        {!! '<em class="uk-text-danger">'.$errors->first('nombre').'</em>' !!} 
                        <span id="_titulo"></span>
                    </div>             
                    <div class="uk-width-1-6">
                        {!! Form::label('Rango Inicio') !!}<em class="uk-text-danger">*</em>    
                        {!! Form::input('number', 'generacion_inicio', Input::old('generacion_inicio'), array('class'=>'uk-width-1-1', 'placeholder'=>'Ingrese titulo', 'autocomplete' =>'off')) !!}
                        <em class="uk-text-danger">{!! $errors->first('generacion_inicio').'</em>' !!} 
                        <span id="_generacion_inicio"></span>
                    </div>  
                    <div class="uk-width-1-6">
                        {!! Form::label('Rango Fin') !!}<em class="uk-text-danger">*</em>                        
                        {!! Form::input('number', 'generacion_fin', Input::old('generacion_fin'), array('class'=>'uk-width-1-1', 'placeholder'=>'Minimo 100', 'autocomplete' =>'off')) !!} 
                        {!! '<em class="uk-text-danger">'.$errors->first('generacion_fin').'</em>' !!}    
                        <span id="_generacion_fin"></span>
                    </div>  

                    <div class="uk-width-2-6">
                        {!! Form::label('hijos_generacion') !!}<em class="uk-text-danger">*</em>
                        {!! Form::input('number', 'hijos_generacion', Input::old('hijos_generacion'), array('class'=>'uk-width-1-1', 'placeholder'=>'', 'autocomplete' =>'off')) !!}       
                        {!! '<em class="uk-text-danger">'.$errors->first('hijos_generacion').'</em>' !!}      
                        <span id="_hijos_generacion"></span>
                    </div>                                      
                </div>                
           </div>

           <div class="uk-grid">
                <div class="uk-grid uk-width-1-1">
                    <div class="uk-width-1-1">
                        {!! Form::label('descripcion') !!}<em class="uk-text-danger">*</em>    
                        {!! Form::input('text', 'descripcion', Request::old('descripcion'), array('class'=>'uk-width-1-1', 'placeholder'=>'Ingrese descripcion', 'autocomplete' =>'off')) !!}   
                        {!! '<em class="uk-text-danger">'.$errors->first('descripcion').'</em>' !!}     
                        <span id="_descripcion"></span>
                    </div>            
                                                       
                </div>                
           </div>

           <div class="uk-grid">
                <div class="uk-grid uk-width-1-1">
                    <div class="uk-width-1-6">
                        {!! Form::label('Tope LT') !!}<em class="uk-text-danger">*</em>    
                        {!! Form::input('number', 'tope_lista_tabu', Input::old('tope_lista_tabu'), array('class'=>'uk-width-1-1', 'placeholder'=>'', 'autocomplete' =>'off')) !!}
                        {!! '<em class="uk-text-danger">'.$errors->first('tope_lista_tabu').'</em>' !!} 
                        <span id="_tope_lista_tabu"></span>
                    </div>  

                    <div class="uk-width-1-6">
                        {!! Form::label('Tiempo max.') !!}<em class="uk-text-danger">*</em>
                        {!! Form::input('number', 'tiempo_maximo', Input::old('tiempo_maximo'), array('class'=>'uk-width-1-1', 'placeholder'=>'', 'autocomplete' =>'off')) !!}  
                        {!! '<em class="uk-text-danger">'.$errors->first('tiempo_maximo').'</em>' !!} 
                        <span id="_tiempo_maximo"></span>
                    </div>     
                    <div class="uk-width-2-6">
                        {!! Form::label('mejora_aceptable') !!}<em class="uk-text-danger">*</em> 
                        {!! Form::input('number', 'mejora_aceptable', Input::old('mejora_aceptable'), array('class'=>'uk-width-1-1', 'placeholder'=>'', 'autocomplete' =>'off')) !!} 
                        {!! '<em class="uk-text-danger">'.$errors->first('mejora_aceptable').'</em>' !!}  
                        <span id="_mejora_aceptable"></span>
                    </div>   
                    <div class="uk-width-2-6">
                        {!! Form::label('porcentaje_lista_elite') !!}<em class="uk-text-danger">*</em>  
                        {!! Form::input('number', 'porcentaje_lista_elite', Input::old('porcentaje_lista_elite'), array('class'=>'uk-width-1-1', 'placeholder'=>'', 'autocomplete' =>'off')) !!}
                        {!! '<em class="uk-text-danger">'.$errors->first('porcentaje_lista_elite').'</em>' !!}               
                        <span id="_porcentaje_lista_elite"></span>
                    </div>                                    
                </div>                
           </div>
           
                

            <div class="uk-grid uk-container-center">
                <div class="uk-width-1-3"></div>
                <div class="uk-width-1-3">
                    <button type="submit" class="uk-button uk-button-primary"  ><i class="uk-icon-save"></i> Guardar</button>
                </div>           
            </div>

        {!! Form::hidden('_token', csrf_token() ) !!}     
        {!! Form::hidden('tabu') !!}     
    
   	 	{!! Form::close() !!}

    </div>    
</div>
<div class="uk-modal"  id="modalTabu">    
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
        <div class="uk-modal-header"><h3>Lista Tabu - Ayuda</h3></div>
        Aqui yo explicare como usar esta interfaz COÑOOOOOOO
        <div class="uk-modal-footer"></div>
    </div>
</div>
@stop

@section('submenu')
<li class="uk-active"><a href="#"><i class="uk-icon-bar-chart"></i> Parametros Alg. Tabu</a></li>                                
<li class="uk-nav-header">Operaciones</li>
<li><a href="{{URL::to('listaTabu')}}"><i class="uk-icon-database"></i> Listas Parametros</a></li>
<li class="uk-nav-divider"></li>
<li><a data-uk-modal="{target:'#modalTabu'}" href="#"><i class="uk-icon-question-circle"></i> Ayuda</a></li>
@stop


