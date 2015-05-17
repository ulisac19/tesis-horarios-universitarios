<?php use App\Models\Profesor; ?>
<?php use App\Models\Seccion; ?>
@extends('layouts.uikit')

@section('head')
<title>Lista de Profesores</title>
@stop

@section('content')

<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-1-1">
        <h1 class="uk-h1">Lista materias profesores </h1>
       <blockquote>Lista de materias que da cada profesor</blockquote>
    </div>
</div>
<br>

<table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
    <thead>
        <tr>
            <th>Profesor</th>
            <th>Materia</th>
            <th>Codigo</th>
            <th>Administrar</th>
        </tr>                            
    </thead>
    <tbody>
    <?php $cant_materias  = ""; ?>
    @foreach ($profesor as $prof)
    <?php  $cant_materias = Profesor::cantidadMaterias($prof->id) ?>       
       <?php $secciones = Seccion::where("profesor_id", "=", $prof->id)->get(); ?>
       <?php $i = 0; ?>
       @foreach ( $secciones as $seccion )
        <tr>
          @if ($i == 0)
            <td rowspan="<?= $cant_materias ?>">{{ $prof->nombre }}</td>
          @endif
          <td>{{ $seccion->materia->nombre }} - Seccion {{ $seccion->numero }}</td>
          <td>{{ $seccion->materia->codigo }}</td>
          @if ($i == 0)
            <td rowspan="<?= $cant_materias ?>"><button class="uk-button uk-button-primary"><i class="uk-icon-eye"></i></button> <button class="uk-button uk-button-success"><i class="uk-icon-pencil"></i></button> <button class="uk-button uk-button-danger" onclick="UIkit.modal.confirm('¿esta seguro?', function(){ UIkit.modal.alert('Quicksilver :('); });"><i class="uk-icon-trash"></i></button></td>
          @endif
        </tr>
        <?php $i++; ?>
        @endforeach
    @endforeach



	
    </tbody>
</table>
<div class="uk-modal"  id="modalListaMateriasProfesores">    
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
        <div class="uk-modal-header"><h3>Lista Materias de Profesores - Ayuda</h3></div>
        Aqui yo explicare como usar esta interfaz COÑOOOOOOO
        <div class="uk-modal-footer"></div>
    </div>
</div>
@stop

@section('submenu')
<li class="uk-active"><a href="#"><i class="uk-icon-bars"></i> Lista Profesores</a></li>                                
<li class="uk-nav-header">Operaciones</li>
<li><a href="{{URL::to('cargarMateriasProfesor')}}"><i class="uk-icon-plus"></i> Profesores</a></li>
<li><a href="{{URL::to('disponibilidadProfesores')}}"><i class="uk-icon-calendar-o"></i> Horarios profesores</a></li>
<li class="uk-nav-divider"></li>
<li><a data-uk-modal="{target:'#modalListaMateriasProfesores'}" href="#"><i class="uk-icon-question-circle"></i> Ayuda</a></li>
@stop


