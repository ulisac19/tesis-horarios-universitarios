<?php 
use App\Models\Departamento;
use App\Models\Horasxmateria;
use App\Models\Carrera;
use App\Models\Tipomateria;
?>
@extends('layouts.uikit')

@section('head')
<title>Cargar Materias</title>

@stop

@section('content')

<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-1-1">
        <h1 class="uk-h1">Cargar Materias</h1>
       <blockquote>Cargar informacion de la materia</blockquote>
    </div>
</div>

<div class="uk-grid">
    <div class="uk-width-1-1">
        {!! Form::open(array(
                    'action' => 'HomeController@cargarMateria',
                    'method' => 'POST',
                    'class' =>  'uk-form',
                    'id' => 'form1'
                            )) 

        !!} 
            <div class="uk-grid">
                <div class="uk-width-1-2">
                    {!! Form::label('materia') !!}<em class="uk-text-danger">*</em>   
                    {!! Form::input('text', 'nombre', Input::old('nombre'), array('class'=>'uk-width-1-1', 'placeholder'=>'Ingresa materia', 'autocomplete' =>'off')) !!} 
                    {!! '<em class="uk-text-danger">'.$errors->first('nombre').'</em>' !!}  
                    <span id="_materia"></span>
                </div>
                <div class="uk-width-1-2">
                    {!! Form::label('codigo') !!}<em class="uk-text-danger">*</em>                    
                    {!! Form::input('text', 'codigo', Input::old('mejora_aceptable'), array('class'=>'uk-width-1-1', 'placeholder'=>'Ingresa codigo', 'autocomplete' =>'off')) !!} 
                    {!! '<em class="uk-text-danger">'.$errors->first('codigo').'</em>' !!}  
                    <span id="_codigo"></span>
                </div>
                
            </div>

            <div class="uk-grid">
                <div class="uk-width-1-3">
                    {!! Form::label('¿Requiere laboratorio?') !!}<em class="uk-text-danger">*</em>  
                    {!! Form::select('requiere_laboratorio',  Tipomateria::all()->lists('descripcion', 'id'), Input::old('requiere_laboratorio'), array('class'=>'uk-width-1-1' )) !!}
                    {!! '<em class="uk-text-danger">'.$errors->first('requiere_laboratorio').'</em>' !!}  
                    <span id="_laboratorio"></span>
                </div>

                <div class="uk-width-1-3">    
                    {!! Form::label('departamento') !!}<em class="uk-text-danger">*</em>            
                    {!! Form::select('departamento_id', Departamento::all()->lists('nombre', 'id'), Input::old('departamento_id'), array('class'=>'uk-width-1-1' )) !!}
                    {!! '<em class="uk-text-danger">'.$errors->first('departamento_id').'</em>' !!}  
                    <span id="_departamento"></span>
                </div>
                <div class="uk-width-1-3"> 
                    {!! Form::label('Unidades de Credito (U.C.)') !!}<em class="uk-text-danger">*</em>                  
                    {!! Form::select('unidades_credito', Horasxmateria::all()->lists('unidades_credito', 'unidades_credito'), Input::old('unidades_credito') , array('class'=>'uk-width-1-1' )) !!}
                    {!! '<em class="uk-text-danger">'.$errors->first('unidades_credito').'</em>' !!}  
                    <span id="_uc"></span>
                </div>               
            </div>

            <br>
            <blockquote>Agregar las secciones de esta materia</blockquote>
                    
                                      
                            <div class="uk-grid">
                                <div class="uk-width-3-10">
                                    {!! Form::label('seccion') !!}<em class="uk-text-danger">*</em> 
                                    {!! Form::input('text', 'seccion_o', Input::old('seccion_o'), array('class'=>'uk-width-1-1', 'placeholder'=>'Ejemplo: 1-9, 11, 14', 'autocomplete' =>'off')) !!} 
                                    {!! '<em class="uk-text-danger">'.$errors->first('seccion_o').'</em>' !!}  
                                    <span id="_seccion_o"></span>
                                </div>
                                <div class="uk-width-3-10">
                                    {!! Form::label('Carrera') !!}<em class="uk-text-danger">*</em> 
                                    {!! Form::select('carrera', Carrera::all()->lists('nombre', 'id'), Input::old('seccion_o'), array('class'=>'uk-width-1-1' )) !!}
                                    {!! '<em class="uk-text-danger">'.$errors->first('mejora_aceptable').'</em>' !!}  
                                    <span id="_carrera"></span>
                                </div>
                                <div class="uk-width-3-10">
                                    {!! Form::label('semestre') !!}<em class="uk-text-danger">*</em>  
                                    {!! Form::select('semestre', array('empty'=>'Indique semestre', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8','9' => '9',), Input::old('semestre'), array('class'=>'uk-width-1-1' )) !!}
                                </div> 
                                <div class="uk-width-1-10"><label class="uk-width-1-1" for="">&nbsp;</label><button class="uk-button uk-button-danger uk-width-1-1 eliminar2"><i class="uk-icon-trash"></i> </button></div>         
                            </div> <br>
                    <div id="contenedor">     
                    </div>
                    <br>
                        
                        <div class="uk-grid uk-container-center">
                              <div class="uk-width-1-3"></div>
                              <div class="uk-width-1-3">
                                  <button type="submit" class="uk-button uk-button-primary uk-width-4-10" data-uk-button><i class="uk-icon-save"></i> Guardar</button>
                                  <button class="uk-button uk-button-success uk-width-4-10" id="agregarCampo" type="button" data-uk-button><i class="uk-icon-plus-circle"></i> Otra </button>
                              </div>           
                         </div>

        {!! Form::hidden('_token', csrf_token() ) !!}     
        {!! Form::hidden('cargarMateria') !!}   
        {!! Form::close() !!}
    </div>    
</div>
<div class="uk-modal"  id="modalCargarMaterias">    
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
        <div class="uk-modal-header"><h3>Cargar Materias - Ayuda</h3></div>
        Aqui yo explicare como usar esta interfaz COÑOOOOOOO
        <div class="uk-modal-footer"></div>
    </div>
</div>
<script> 
var x = $("#contenedor div").length + 1;
var FieldCount = x-1; 

    $(document).ready(function() {
        $('#agregarCampo').click(function (e) {
            $("#contenedor").append('<div class="uk-grid"><div class="uk-width-3-10">'+ '{!! Form::label("seccion") !!}'+ '{!! Form::input("text", "seccion[]", "", array("id"=>"seccion_'+FieldCount+'", "class"=>"uk-width-1-1", "placeholder"=>"Ejemplo: 1-9, 11, 14", "autocomplete" =>"off")) !!} '+ '<span id="_seccion_o"></span>'+ '</div>'+ '<div class="uk-width-3-10">'+'{!! Form::label("Carrera") !!}'+ '{!! Form::select("carrera[]", carrera::all()->lists("nombre", "id"), "", array("id"=>"carrera_'+FieldCount+'", "class"=>"uk-width-1-1" )) !!}' + '<span id="_carrera"></span></div>'+ '<div class="uk-width-3-10">{!! Form::label("semestre") !!}<em class="uk-text-danger">*</em>{!! Form::select("semestre[]", array("empty"=>"Indique semestre", "1"=> "1", "2"=> "2", "3"=> "3", "4"=> "4", "5"=> "5", "6"=> "6", "7"=> "7", "8"=> "8","9"=> "9",), "", array("id"=>"semestre_'+FieldCount+'","class"=>"uk-width-1-1" )) !!}</div><div class="uk-width-1-10"><label class="uk-width-1-1" for="">&nbsp;</label><button class="uk-button uk-button-danger uk-width-1-1 eliminar2"><i class="uk-icon-trash"></i> </button></div> </div>'+ '</div>');
            return false;
        });

        $(".uk-grid").on("click",".eliminar2", function(e){ //click en eliminar campo
        
            $(this).parent('div').parent('div').remove(); //eliminar el campo
            x--;
        
        return false;   
    }); 

});

</script>
@stop


     

@section('submenu')
<li class="uk-active"><a href="#"><i class="uk-icon-plus"></i> Cargar materia</a></li>                                
<li class="uk-nav-header">Operaciones</li>
<li><a href="{{URL::to('listaMaterias')}}"><i class="uk-icon-bars"></i> Listas de materias</a></li>
<li><a href="{{URL::to('grupoMaterias')}}"><i class="uk-icon-book"></i> Grupos de materias</a></li>
<li class="uk-nav-divider"></li>
<li><a data-uk-modal="{target:'#modalCargarMaterias'}" href="#"><i class="uk-icon-question-circle"></i> Ayuda</a></li>
@stop
