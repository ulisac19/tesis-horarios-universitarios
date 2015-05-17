@extends('layouts.uikit')

@section('head')
<title>Editar configuracion algoritmo genetico</title>
@stop

@section('content')
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-1-1">
        <h1 class="uk-h1">Editar configuracion <span class="uk-text-success">#{{$cursor->id}}</span> Alg. Genetico</h1>
       <blockquote>Editar parametros de configuracion para ejecutar el algoritmo genetico</blockquote>
    </div>
</div>
<br>
<div class="uk-grid ">
    <div class="uk-width-1-1">
        {!! Form::open(array(
                    'action' => 'ParametrosController@editarGenetico',
                    'method' => 'POST',
                    'class' =>  'uk-form',
                    'id' => 'form1'
                            )) 

        !!}             
            <div class="uk-grid">
                <div class="uk-grid uk-width-1-1">
                    <div class="uk-width-2-6">
                        {!! Form::label('nombre') !!}<em class="uk-text-danger">*</em>    
                        {!! Form::input('text', 'nombre', $cursor->nombre , array('class'=>'uk-width-1-1 uk-form-success', 'autocomplete' =>'off')) !!}
                        {!! '<em class="uk-text-danger">'.$errors->first('nombre').'</em>' !!} 
                        <span id="_titulo"></span>
                    </div>             
                    <div class="uk-width-1-6">
                        {!! Form::label('Rango Inicio') !!}<em class="uk-text-danger">*</em>    
                        {!! Form::input('number', 'generacion_inicio', $cursor->generacion_inicio, array('class'=>'uk-width-1-1 uk-form-success', 'placeholder'=>'Ingrese titulo', 'autocomplete' =>'off')) !!}
                        <em class="uk-text-danger">{!! $errors->first('generacion_inicio').'</em>' !!} 
                        <span id="_generacion_inicio"></span>
                    </div>  
                    <div class="uk-width-1-6">
                        {!! Form::label('Rango Fin') !!}<em class="uk-text-danger">*</em>                        
                        {!! Form::input('number', 'generacion_fin', $cursor->generacion_fin, array('class'=>'uk-width-1-1 uk-form-success', 'placeholder'=>'Minimo 100', 'autocomplete' =>'off')) !!} 
                        {!! '<em class="uk-text-danger">'.$errors->first('generacion_fin').'</em>' !!}    
                        <span id="_generacion_fin"></span>
                    </div>  

                    <div class="uk-width-2-6">
                        {!! Form::label('hijos_generacion') !!}<em class="uk-text-danger">*</em>
                        {!! Form::input('number', 'hijos_generacion', $cursor->hijos_generacion, array('class'=>'uk-width-1-1 uk-form-success', 'placeholder'=>'', 'autocomplete' =>'off')) !!}       
                        {!! '<em class="uk-text-danger">'.$errors->first('hijos_generacion').'</em>' !!}      
                        <span id="_hijos_generacion"></span>
                    </div>                                      
                </div>                
           </div>

           <div class="uk-grid">
                <div class="uk-grid uk-width-1-1">
                    <div class="uk-width-1-1">
                        {!! Form::label('descripcion') !!}<em class="uk-text-danger">*</em>    
                        {!! Form::input('text', 'descripcion', $cursor->descripcion, array('class'=>'uk-width-1-1 uk-form-success', 'placeholder'=>'Ingrese descripcion', 'autocomplete' =>'off')) !!}   
                        {!! '<em class="uk-text-danger">'.$errors->first('descripcion').'</em>' !!}     
                        <span id="_descripcion"></span>
                    </div>            
                                                       
                </div>                
           </div>

           <div class="uk-grid">
                <div class="uk-grid uk-width-1-1">                    

                    <div class="uk-width-2-6">
                        {!! Form::label('tiempo_maximo') !!}<em class="uk-text-danger">*</em>
                        {!! Form::input('number', 'tiempo_maximo', $cursor->tiempo_maximo, array('class'=>'uk-width-1-1 uk-form-success', 'placeholder'=>'', 'autocomplete' =>'off')) !!}  
                        {!! '<em class="uk-text-danger">'.$errors->first('tiempo_maximo').'</em>' !!} 
                        <span id="_tiempo_maximo"></span>
                    </div>     
                    <div class="uk-width-2-6">
                        {!! Form::label('mejora_aceptable') !!}<em class="uk-text-danger">*</em> 
                        {!! Form::input('number', 'mejora_aceptable', $cursor->mejora_aceptable, array('class'=>'uk-width-1-1 uk-form-success', 'placeholder'=>'', 'autocomplete' =>'off')) !!} 
                        {!! '<em class="uk-text-danger">'.$errors->first('mejora_aceptable').'</em>' !!}  
                        <span id="_mejora_aceptable"></span>
                    </div>   
                    <div class="uk-width-2-6">
                        {!! Form::label('porcentaje_lista_elite') !!}<em class="uk-text-danger">*</em>  
                        {!! Form::input('number', 'porcentaje_lista_elite', $cursor->porcentaje_lista_elite, array('class'=>'uk-width-1-1 uk-form-success', 'placeholder'=>'', 'autocomplete' =>'off')) !!}
                        {!! '<em class="uk-text-danger">'.$errors->first('porcentaje_lista_elite').'</em>' !!}               
                        <span id="_porcentaje_lista_elite"></span>
                    </div>                                    
                </div>                
           </div>
           

           <div class="uk-grid">
                <div class="uk-grid uk-width-1-1">
                    <div class="uk-width-2-6">
                        {!! Form::label('probabilidad_mutacion') !!}<em class="uk-text-danger">*</em>    
                        {!! Form::input('text', 'probabilidad_mutacion', $cursor->probabilidad_mutacion, array('class'=>'uk-width-1-1 uk-form-success', 'placeholder'=>'0-1', 'autocomplete' =>'off')) !!}   
                        {!! '<em class="uk-text-danger">'.$errors->first('probabilidad_mutacion').'</em>' !!}     
                        <span id="_probabilidad_mutacion"></span>
                    </div>  

                    <div class="uk-width-2-6">
                        {!! Form::label('probabilidad_cruce') !!}<em class="uk-text-danger">*</em>    
                        {!! Form::input('text', 'probabilidad_cruce', $cursor->probabilidad_cruce, array('class'=>'uk-width-1-1 uk-form-success', 'placeholder'=>'0-1', 'autocomplete' =>'off')) !!}   
                        {!! '<em class="uk-text-danger">'.$errors->first('probabilidad_cruce').'</em>' !!}     
                        <span id="_probabilidad_cruce"></span>
                    </div>     
                    <div class="uk-width-2-6">
                        {!! Form::label('probabilidad_tabu') !!}<em class="uk-text-danger">*</em>    
                        {!! Form::input('text', 'probabilidad_tabu', $cursor->probabilidad_tabu, array('class'=>'uk-width-1-1 uk-form-success', 'placeholder'=>'0-1', 'autocomplete' =>'off')) !!}   
                        {!! '<em class="uk-text-danger">'.$errors->first('probabilidad_tabu').'</em>' !!}     
                        <span id="_probabilidad_tabu"></span>
                    </div>                                      
                </div>                
           </div>
           
                

            <div class="uk-grid uk-container-center">
                <div class="uk-width-1-3"></div>
                <div class="uk-width-1-3">
                    <button type="submit" class="uk-button uk-button-primary uk-width-4-10" data-uk-button><i class="uk-icon-save"></i> Salvar</button>
                    <button type="button" onclick="location.href='{{URL::route('listaGenetico')}}'" class="uk-button uk-button-danger" data-uk-button><i class="uk-icon-reply"></i> Cancelar</button>
                </div>           
            </div>

        {!! Form::hidden('_token', csrf_token() ) !!}     
        {!! Form::hidden('id', $cursor->id) !!}     
        {!! Form::hidden('editarGenetico') !!}     
    
        {!! Form::close() !!}

    </div>    
</div>

@stop

@section('submenu')
<li class="uk-active"><a href="#"><i class="uk-icon-pencil"></i> Editar configuracion Alg. Genetico</a></li>                                     
<li><a href="#" onclick="location.href='{{URL::route('verGenetico',array('id'=>$cursor->id))}}'"><i class="uk-icon-eye"></i> Ver configuracion Alg. Genetico</a></li>                                
<li><a href="#" onclick="UIkit.modal.confirm('¿esta seguro?', function(){ location.href='{{URL::route('eliminarListaGenetico',array('id'=>$cursor->id))}}';});"><i class="uk-icon-trash"></i> Eliminar configuracion Alg. Genetico</a></li>                                

<li class="uk-nav-header">Operaciones</li>
<li><a href="{{URL::to('listaGenetico')}}"><i class="uk-icon-database"></i> Configuraciones Alg. Genetico</a></li>
<li><a href="{{URL::to('genetico')}}"><i class="uk-icon-bar-chart"></i> Agregar configuracion Alg. Genetico</a></li>                                
<li class="uk-nav-divider"></li>
<li><a data-uk-modal="{target:'#modalListaMaterias'}" href="#"><i class="uk-icon-question-circle"></i> Ayuda</a></li>
@stop


<div class="uk-modal"  id="modalListaMaterias">    
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
        <div class="uk-modal-header"><h3>Lista Materias - Ayuda</h3></div>
        Aqui yo explicare como usar esta interfaz COÑOOOOOOO
        <div class="uk-modal-footer"></div>
    </div>
</div>