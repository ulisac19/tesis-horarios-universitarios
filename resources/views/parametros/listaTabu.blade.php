@extends('layouts.uikit')

@section('head')
<title>Listas Parametros Busqueda Tabu</title>
@stop

@section('content')
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-1-1">
        <h1 class="uk-h1">Listas Parametros Busqueda Tabu</h1>
       <blockquote>Lista de paramatros para ejecutar el algoritmo de busqueda tabu</blockquote>
    </div>
</div>
<br>
<table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
    <thead>         
        <tr>
            <th></th>
            <th></th>
            <th></th>          
        </tr>    
        <tr>            
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Administrar</th>
        </tr>                            
    </thead>
    <tbody>
        @foreach ($cursor as $item)       
            <tr>
                <td>{{$item->nombre}}</td>
                <td>{{$item->descripcion}}</td>
                <td><button onclick="location.href='{{URL::route('verTabu',array('id'=>$item->id))}}'" class="uk-button uk-button-primary"><i class="uk-icon-eye"></i></button> <button onclick="location.href='{{URL::route('editarTabu',array('id'=>$item->id))}}'" class="uk-button uk-button-success"><i class="uk-icon-pencil"></i></button> <button class="uk-button uk-button-danger" onclick="UIkit.modal.confirm('¿esta seguro?', function(){ location.href='{{URL::route('eliminarListaTabu',array('id'=>$item->id))}}';});"><i class="uk-icon-trash"></i></button></td>
            </tr>
        @endforeach
        
    </tbody>
</table>
<div class="uk-modal"  id="modalListaTabu">    
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
        <div class="uk-modal-header"><h3> Configuraciones del Algoritmo Tabu - Ayuda</h3></div>
        Aqui yo explicare como usar esta interfaz COÑOOOOOOO
        <div class="uk-modal-footer"></div>
    </div>
</div>
@stop

@section('submenu')
<li class="uk-active"><a href="#"><i class="uk-icon-database"></i> Listas Parametros</a></li>
<li class="uk-nav-header">Operaciones</li>
<li><a href="{{URL::to('tabu')}}"><i class="uk-icon-bar-chart"></i> Parametros Alg. Tabu</a></li>                                
<li class="uk-nav-divider"></li>
<li><a data-uk-modal="{target:'#modalListaTabu'}" href="#"><i class="uk-icon-question-circle"></i> Ayuda</a></li>
@stop


