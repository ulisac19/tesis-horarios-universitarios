<?php use App\Models\Tipomateria; ?>
<?php use App\Models\Horasxmateria; ?>
@extends('layouts.uikit')

@section('head')
<title>Lista de Materias</title>
@stop

@section('content')

<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-1-1">
        <h1 class="uk-h1">Materias</h1>
       <blockquote>Listas de materias cargadas</blockquote>
    </div>
</div>
<br>
<table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
    <thead>
        <tr>
            <th>Materia</th>
            <th>Seccion</th>
            <th>Codigo</th>
            <th>U.C.</th>
            <th>Semestre</th>
            <th>Laboratorio</th>
            <th>Administrar</th>
        </tr>                            
    </thead>
    <tbody>
        @foreach ($cursor as $item)   
        <tr>
            <td>{{ $item->materia->nombre }}</td>
            <td>{{ $item->numero }}</td>
            <td>{{ $item->materia->codigo }}</td>
            <td>{{ Horasxmateria::getUnidadesCredito($item->materia->unidades_credito) }}</td>
            <td>{{ $item->semestre }}</td>
            <td>{{ Tipomateria::getNombre($item->materia->requiere_laboratorio) }}</td>
            <td><button class="uk-button uk-button-primary"><i class="uk-icon-eye"></i></button> <button class="uk-button uk-button-success"><i class="uk-icon-pencil"></i></button> <button class="uk-button uk-button-danger" onclick="UIkit.modal.confirm('¿esta seguro?', function(){ location.href='{{URL::route('eliminarListaSeccion',array('id'=>$item->id))}}';});"><i class="uk-icon-trash"></i></button></td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="uk-modal"  id="modalListaMaterias">    
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
        <div class="uk-modal-header"><h3>Lista Materias - Ayuda</h3></div>
        Aqui yo explicare como usar esta interfaz COÑOOOOOOO
        <div class="uk-modal-footer"></div>
    </div>
</div>
@stop

@section('submenu')
<li class="uk-active"><a href="#"><i class="uk-icon-bars"></i> Lista de materias</a></li>                                                              
<li class="uk-nav-header">Operaciones</li>
<li><a href="{{URL::to('cargarMateria')}}"><i class="uk-icon-plus"></i> Cargar materia</a></li>
<li><a href="{{URL::to('grupoMaterias')}}"><i class="uk-icon-book"></i> Grupos de materias</a></li>
<li class="uk-nav-divider"></li>
<li><a data-uk-modal="{target:'#modalListaMaterias'}" href="#"><i class="uk-icon-question-circle"></i> Ayuda</a></li>
@stop
