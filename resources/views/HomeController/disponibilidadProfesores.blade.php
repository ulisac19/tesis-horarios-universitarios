@extends('layouts.uikit')

@section('head')
<title>Cargar Materias de Profesor</title>
@stop

@section('content')
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-1-1">
        <h1 class="uk-h1">Disponibilidad horario de profesores</h1>
       <blockquote>Cargar las materias que da cada profesor</blockquote>
    </div>
</div>
<br>
@stop

@section('submenu')
<li class="uk-active"><a href="#"><i class="uk-icon-calendar-o"></i> horarios profesores</a></li>
<li class="uk-nav-header">Operaciones</li>
<li><a href="{{URL::to('listaMateriasProfesor')}}"><i class="uk-icon-bars"></i> Listas Profesores</a></li>
<li><a href="{{URL::to('cargarMateriasProfesor')}}"><i class="uk-icon-plus"></i> Profesores</a></li>                                
<li class="uk-nav-divider"></li>
<li><a data-uk-modal="{target:'#modalCargarMateriasProfesor'}" href="#"><i class="uk-icon-question-circle"></i> Ayuda</a></li>
@stop