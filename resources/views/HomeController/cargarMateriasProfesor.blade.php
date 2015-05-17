@extends('layouts.uikit')

@section('head')
<title>Cargar Materias de Profesor</title>
@stop

@section('content')
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-1-1">
        <h1 class="uk-h1">Cargar Materias de Profesor</h1>
       <blockquote>Cargar las materias que da cada profesor</blockquote>
    </div>
</div>
<br>


<div class="uk-grid ">
    <div class="uk-width-1-1">
		{!! Form::open(array(
                    'action' => 'HomeController@cargarMateriasProfesor',
                    'method' => 'POST',
                    'class' =>  'uk-form',
                    'id' => 'form1'
                            )) 

        !!} 
			<div class="uk-grid">
                
                <div class="uk-width-1-3">
                	<label class="uk-form-label"></label>
                </div>

                <div class="uk-width-1-3">
                    <label class="uk-form-label">Profesor <em class="uk-text-danger">*</em></label>             
                    <div class="uk-autocomplete uk-form" data-uk-autocomplete="{source: <?= $cadenaP ?>}">
		                <input type="text" name="profesor">
		            </div>
                </div>
                            
            </div>


            <div class="uk-grid">
                <div class="uk-grid uk-width-1-1">
	                <div class="uk-width-8-10">
                        <label class="uk-form-label">Codigo - Materia - Seccion <em class="uk-text-danger">*</em></label>
                        <div class="uk-autocomplete uk-form uk-width-1-1" data-uk-autocomplete="{source: <?= $cadenaS ?>">
                            <input type="text" name="seccion[]" id="seccion_0" placeholder="Ingrese codigo, materia y seccion" class="uk-width-1-1">
                        </div>
                    </div>  
                           
                </div>                
           </div><br>
            <div id="contenedor">
                
            </div><br>
				

            <div class="uk-grid uk-container-center">
                <div class="uk-width-1-3"></div>
                <div class="uk-width-1-3">
                    <button type="submit" class="uk-button uk-button-primary uk-width-4-10" data-uk-button><i class="uk-icon-save"></i> Guardar</button>
                    <button class="uk-button uk-button-success uk-width-4-10" id="agregarCampo" type="button" data-uk-button><i class="uk-icon-plus-circle"></i> Otra </button>
                </div>           
            </div>


   	 	{!! Form::hidden('_token', csrf_token() ) !!}     
        {!! Form::hidden('cargarMateriasProfesor') !!}   
        {!! Form::close() !!}

    </div>    
</div>
<div class="uk-modal"  id="modalCargarMateriasProfesor">    
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
        <div class="uk-modal-header"><h3>Cargar Materias de Profesores - Ayuda</h3></div>
        Aqui yo explicare como usar esta interfaz COÑOOOOOOO
        <div class="uk-modal-footer"></div>
   </div>
</div>
<script>
$(document).ready(function() {   
        var contenedor       = $("#contenedor"); //ID del contenedor
        var AddButton       = $("#agregarCampo"); //ID del Botón Agregar

        //var x = número de campos existentes en el contenedor
        var x = $("#contenedor div").length + 1;
        var FieldCount = 0; //para el seguimiento de los campos

        $(AddButton).click(function (e) {

                FieldCount++;
                $(contenedor).append('<div class="uk-grid"> <div class="uk-grid uk-width-1-1"> <div class="uk-width-8-10"> <label class="uk-form-label">Codigo - Materia - Seccion <em class="uk-text-danger">*</em></label> <div class="uk-autocomplete uk-form uk-width-1-1" data-uk-autocomplete="{source: {{ $cadenaS }}"> <input type="text" name="seccion[]" id="seccion_'+ FieldCount +'" placeholder="Ingrese codigo, materia y seccion" class="uk-width-1-1"> </div></div><div class="uk-width-1-10"><label class="uk-width-1-1" for="">&nbsp;</label><button class="uk-button uk-button-danger uk-width-1-1 eliminar"><i class="uk-icon-trash"></i> </button></div></div></div>');
            
               
                x++; //text box increment
           
            return false;
        });

        $("body").on("click",".eliminar", function(e){ //click en eliminar campo
            
                $(this).parent('div').parent('div').parent('div').remove(); //eliminar el campo
                
            
            return false;
        });    
        
    
    
    
}); 
</script> 
@stop

@section('submenu')
<li class="uk-active"><a href="#"><i class="uk-icon-plus"></i> Profesores</a></li>                                
<li class="uk-nav-header">Operaciones</li>
<li><a href="{{URL::to('listaMateriasProfesor')}}"><i class="uk-icon-bars"></i> Listas Profesores</a></li>
<li class="uk-nav-divider"></li>
<li><a data-uk-modal="{target:'#modalCargarMateriasProfesor'}" href="#"><i class="uk-icon-question-circle"></i> Ayuda</a></li>
@stop