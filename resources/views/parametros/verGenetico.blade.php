@extends('layouts.uikit')

@section('head')
<title>Ver Configuracion Algoritmo Genetico</title>
<style type="text/css">
.tm-article-subtitle {
    padding-left: 6px;
    border-left: 3px solid #1FA2D6;
    font-size: 16px;
    line-height: 16px;
}
</style>
@stop

@section('content')
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-1-1">
        <h1 class="uk-h1">Configuracion <span class="uk-text-success">#{{$cursor->id}}</span> Alg. genetico</h1>
       <blockquote>Ver Configuracion Algoritmo Genetico</blockquote>
    </div>
</div>

<div class="uk-grid">
    <div class="uk-width-1-1">

        <div class="uk-grid">
            <div class="uk-grid uk-width-1-1">
                <div class="uk-width-2-6">
                    <h2 class="tm-article-subtitle">Nombre</h2>
                    <blockquote>
                        <p>{{$cursor->nombre}}</p>
                    </blockquote>
                </div>
                <div class="uk-width-4-6">
                    <h2 class="tm-article-subtitle">Descripcion</h2>
                    <blockquote>
                        <p>{{$cursor->descripcion}}</p>
                    </blockquote>
                </div>  
               
                
            </div>
        </div>

        <div class="uk-grid">
            <div class="uk-grid uk-width-1-1">
                <div class="uk-width-2-6">
                    <h2 class="tm-article-subtitle">Hijos</h2>
                    <blockquote>
                        <p>Cada individuo generara un total de <span class="uk-text-bold">{{$cursor->hijos_generacion}}</span> hijos por generacion</p>                
                    </blockquote>
                </div>
                <div class="uk-width-2-6">
                    <h2 class="tm-article-subtitle">Tiempo</h2>
                    <blockquote>
                        <p>Cuando el algoritmo haya alcanzado un tiempo de <span class="uk-text-bold">{{$cursor->tiempo_maximo}}</span> minutos de detendra </p>  
                    </blockquote>
                </div>
                <div class="uk-width-2-6">
                    <h2 class="tm-article-subtitle">Mejora Aceptable</h2>
                    <blockquote>
                        <p>Cuando el algoritmo haya minimizado en <span class="uk-text-bold">{{$cursor->mejora_aceptable}} %</span> los choques se detendra</p>                
                    </blockquote>
                </div>                
            </div>
        </div><div class="uk-grid">
            <div class="uk-grid uk-width-1-1">
                 <div class="uk-width-2-6">
                    <h2 class="tm-article-subtitle">Inicio</h2>
                    <blockquote>
                        <p>El algoritmo realizara como minimo <span class="uk-text-bold">{{$cursor->generacion_inicio}}</span> iteraciones</p>                
                    </blockquote>
                </div>
                <div class="uk-width-2-6">
                    <h2 class="tm-article-subtitle">Fin</h2>
                    <blockquote>
                        <p>El algoritmo se detendra cuando haya alcanzado <span class="uk-text-bold">{{$cursor->generacion_fin}}</span> iteraciones</p>  
                    </blockquote>
                </div>              
                <div class="uk-width-2-6">
                    <h2 class="tm-article-subtitle">Lista elite</h2>
                    <blockquote>
                        <p>Sera conformada por el <span class="uk-text-bold">{{$cursor->porcentaje_lista_elite}} %</span> de la poblacion</p>  
                    </blockquote>
                </div>                
            </div>
        </div>
        <div class="uk-grid">
            <div class="uk-grid uk-width-1-1">
                <div class="uk-width-2-6">
                    <h2 class="tm-article-subtitle">Cruce</h2>
                    <blockquote>
                        <p>La probabilidad de cruce para cada individuo nuevo es de <span class="uk-text-bold">{{$cursor->probabilidad_cruce}} %</span></p>                
                    </blockquote>
                </div>
                <div class="uk-width-2-6">
                    <h2 class="tm-article-subtitle">Mutacion</h2>
                    <blockquote>
                        <p>La probabilidad de mutacion para cada individuo nuevo es de <span class="uk-text-bold">{{$cursor->probabilidad_mutacion}} %</span></p>  
                    </blockquote>
                </div>
                <div class="uk-width-2-6">
                    <h2 class="tm-article-subtitle">Busqueda Tabu</h2>
                    <blockquote>
                        <p>La probabilidad de que se realiace una BT para cada individuo nuevo es de <span class="uk-text-bold">{{$cursor->probabilidad_tabu}} %</span></p>  
                    </blockquote>
                </div>               
            </div>
        </div>

    </div>
</div>



@stop

@section('submenu')
<li class="uk-active"><a href="#"><i class="uk-icon-eye"></i> Ver configuracion Alg. Genetico</a></li>                                
<li><a href="#" onclick="location.href='{{URL::route('editarGenetico',array('id'=>$cursor->id))}}'"><i class="uk-icon-pencil"></i> Editar configuracion Alg. Genetico</a></li>                                     
<li><a href="#" onclick="UIkit.modal.confirm('¿esta seguro?', function(){ location.href='{{URL::route('eliminarListaGenetico',array('id'=>$cursor->id))}}';});"><i class="uk-icon-trash"></i> Eliminar configuracion Alg. Genetico</a></li>                                
<li class="uk-nav-header">Operaciones</li>
<li><a href="{{URL::to('genetico')}}"><i class="uk-icon-bar-chart"></i> Agregar configuracion Alg. Genetico</a></li>                                
<li><a href="{{URL::to('listaGenetico')}}"><i class="uk-icon-database"></i> Configuraciones Alg. Genetico</a></li>
<li class="uk-nav-divider"></li>
<li><a data-uk-modal="{target:'#modalVerGenetico'}" href="#"><i class="uk-icon-question-circle"></i> Ayuda</a></li>
@stop


<div class="uk-modal"  id="modalVerGenetico">    
    <div class="uk-modal-dialog">
        <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
        <div class="uk-modal-header"><h3>Ver Configuracion Algoritmo Genetico - Ayuda</h3></div>
        Aqui yo explicare como usar esta interfaz COÑOOOOOOO
        <div class="uk-modal-footer"></div>
    </div>
</div>