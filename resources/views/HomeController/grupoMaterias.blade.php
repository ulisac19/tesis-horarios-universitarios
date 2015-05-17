<?php  
use App\Models\Seccion;
use App\Models\Horasxmateria;
use App\Models\Tipomateria;
?>
@extends('layouts.uikit')

@section('head')
<title>Grupo de materias</title>
@stop

@section('content')
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-1-1">
        <h1 class="uk-h1">Grupos de Materia</h1>
       <blockquote>Grupos de materias por semestre que no pueden chocar</blockquote>
    </div>
</div>
<br>
<div class="uk-grid ">
    <div class="uk-width-1-1">
        {!! Form::open(array(
                    'action' => 'HomeController@grupoMaterias',
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
                	<label class="uk-form-label">Semestre <em>*</em></label>
                    {!! Form::select('semestre', ['empty'=>'Indique Semestre', '1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9'], null, array('class'=>'uk-width-1-1', 'id'=>'semestre' )) !!}
                    
                </div>
                            
            </div>
<?php $cursor = array(); ?>
<div >
         

         
        </div>
<table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
    <thead>
        <tr>
            <th>Materia</th>
            <th>Seccion</th>
            <th>Codigo</th>
            <th>U.C.</th>
            <th>Laboratorio</th>
            <th>¿Es de Grupo?</th>
        </tr>                            
    </thead>
    <tbody id="cont">
        
    </tbody>
</table>

				<div class="uk-width-1-3">
                	<label class="uk-form-label"> &nbsp;</label><br> 
                	<button class="uk-button uk-button-primary"  type="submit" data-uk-button><i class="uk-icon-save"></i> Guardar </button>
                </div>
   	 	{!! Form::hidden('_token', csrf_token() ) !!}     
        {!! Form::hidden('grupoMaterias') !!}   
        {!! Form::close() !!}

    </div>    
</div>
<div class="uk-modal"  id="modalListaMateriasGrupo">    
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
        <div class="uk-modal-header"><h3>Lista Materias de grupo - Ayuda</h3></div>
        Aqui yo explicare como usar esta interfaz COÑOOOOOOO
        <div class="uk-modal-footer"></div>
    </div>
</div>
<script> 
$( "#semestre" ).change(function() {

        $.ajax({
            url: '{{ URL::to('cargarData') }}/'+$( "#semestre" ).val(),
            type: 'GET',
            data: '',
            beforeSend: function(){
                $("#cont").html('<i class="uk-icon-spinner uk-icon-spin"></i>');
            }, 
            success: function (info){
                $("#cont").html(info);
                
            },
            error: function (jqXHR, estado, error){
                //....
            },
            complete: function (jqXHR, estado){
                //....
            },
            setTimeout: 10000,
        });
});

</script>
@stop

@section('submenu')
<li class="uk-active"><a href="#"><i class="uk-icon-book"></i> Grupos de materias</a></li>
<li class="uk-nav-header">Operaciones</li>
<li><a href="{{URL::to('listaMaterias')}}"><i class="uk-icon-bars"></i> Lista de materias</a></li>
<li><a href="{{URL::to('cargarMateria')}}"><i class="uk-icon-plus"></i> Cargar materia</a></li> 
<li class="uk-nav-divider"></li>
<li><a data-uk-modal="{target:'#modalListaMateriasGrupo'}" href="#"><i class="uk-icon-question-circle"></i> Ayuda</a></li>
@stop


