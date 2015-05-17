<!DOCTYPE html>
<html>
    <head>
        <?php $vista = Route::currentRouteName(); ?>
        <?php $cadena = ""; ?>
        <?php if($vista == "verGenetico" || $vista == "editarGenetico" || $vista == "editarTabu" || $vista == "verTabu"){ ?>
        <?php $cadena = "../"; ?>
        <?php } ?>
        
        <link rel="stylesheet" href="{{$cadena}}uikit/css/uikit.min.css" />
        <link rel="stylesheet" href="{{$cadena}}uikit/css/uikit.docs.min.css" />
        <script src="{{$cadena}}uikit/js/jquery.js"></script>
        <script src="{{$cadena}}uikit/js/uikit.min.js"></script>
        <script src="{{$cadena}}uikit/js/components/autocomplete.js"></script>
        @yield('head')
    </head>
    <body>
    <!-- Menu no responsive -->
                    <?php                         
                        $administrar  = "";
                        $parametros = "";
                        
                        /* primer menu */
                        if($vista == "listaMaterias" || $vista == "cargarMateria" || $vista == "grupoMaterias" || $vista == "listaMateriasProfesor" || $vista == "cargarMateriasProfesor"|| $vista == "disponibilidadProfesores")
                        {
                            $administrar = "uk-active";
                            $parametros = "";
                        }
                        /* segundo menu */
                        if($vista == "genetico" || $vista == "listaGenetico" || $vista == "tabu" || $vista == "listaTabu" || $vista == "verGenetico" || $vista == "editarGenetico" || $vista == "editarTabu" || $vista == "verTabu")
                        {
                            $administrar = "";
                            $parametros = "uk-active";
                        }
                    ?>

            <nav class="uk-navbar">
                <ul class="uk-navbar-nav uk-hidden-small">
                    <li><a href="" class="uk-navbar-nav-subtitle">
                        <i class="uk-icon-home"></i> Home
                        <div>Pagina Inicio</div>
                    </a></li>
                    

                    <li class="uk-parent {{$administrar}}" data-uk-dropdown>
                        <a href="" class="uk-navbar-nav-subtitle"><i class="uk-icon-cog"></i> Administrar
                         <div>Parametros del Sistema</div>
                        <div class="uk-dropdown uk-dropdown-navbar">
                            <ul class="uk-nav uk-nav-navbar">
                                <li><a href="#">Diccionario de Datos </a></li>
                                <li class="uk-nav-header">Restricciones</li>
                                <li><a href="{{URL::to('listaMaterias')}}">Materias</a></li>
                                <li><a href="{{URL::to('listaMateriasProfesor')}}">Profesores</a></li>
                                <li class="uk-nav-divider"></li>
                                <li class="uk-nav-header">Base datos inicial</li>
                                <li><a href="#">Departamentos</a></li>
                                <li><a href="#">Profesores</a></li>
                                <li><a href="#">Salones</a></li>
                                <li><a href="#">Carreras</a></li>
                            </ul>
                        </div>
                     </a></li>

                     <li class="uk-parent {{$parametros}}" data-uk-dropdown>
                        <a href="" class="uk-navbar-nav-subtitle"><i class="uk-icon-calculator"></i> Parametros Algoritmos
                         <div>Restricciones del Modelo</div>
                        <div class="uk-dropdown uk-dropdown-navbar">
                            <ul class="uk-nav uk-nav-navbar">
                                <li><a href="#">Diccionario de Datos </a></li>
                                <li class="uk-nav-header">Genetico</li>
                                <li><a href="{{URL::to('genetico')}}">Fijar parametros</a></li>
                                <li class="uk-nav-divider"></li>
                                <li class="uk-nav-header">Busqueda Tabu</li>
                                <li><a href="{{URL::to('tabu')}}">Fijar parametros</a></li>

                            </ul>
                        </div>
                     </a></li>

                     <li class="uk-parent" data-uk-dropdown>
                        <a href="" class="uk-navbar-nav-subtitle"><i class="uk-icon-calendar"></i> Horarios
                         <div>Consultar Horarios</div>
                        <div class="uk-dropdown uk-dropdown-navbar">
                            <ul class="uk-nav uk-nav-navbar">
                                <li><a href="#">Consultar</a></li>
                                <li><a href="#">Ejecutar Algoritmo</a></li>

                            </ul>
                        </div>
                     </a></li>


                </ul>
                <ul class="uk-navbar-nav uk-navbar-flip uk-hidden-small">
                    <li><a href="" class="uk-navbar-nav-subtitle">
                        <i class="uk-icon-question-circle"></i> Ayuda
                        <div>Manual sistema</div>
                    </a></li>
                    <li><a href="" class="uk-navbar-nav-subtitle">
                        <i class="uk-icon-sign-in"></i> Login
                        <div>Iniciar Sesion</div>
                    </a></li>

                    <li><a href="" class="uk-navbar-nav-subtitle">
                        <i class="uk-icon-sign-out"></i> Logout
                        <div>Cerrar Sesion</div>
                    </a></li>

                </ul>
                <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
                <div class="uk-navbar-brand uk-navbar-center uk-visible-small"></div>
            </nav>
            <!-- Menu no responsive [Fin] -->   



            <div class="uk-grid uk-container-center uk-margin-top">  

               
           
                <!-- Insertar contenido -->
                <div class="tm-sidebar uk-width-medium-1-10 uk-margin-top uk-hidden-small">
                </div>
                <div class="tm-sidebar uk-width-medium-6-10 uk-margin-top">
                    @yield('content')
                </div>
                <!-- Insertar contenido [Fin] -->  


                <!-- Insertar contenido sub-menu -->
                <div class="tm-sidebar uk-width-medium-2-10 uk-hidden-small">
                    <div class="uk-panel uk-panel-box">
                        <h3 class="uk-panel-title">Administrar</h3>
                        <ul class="uk-nav uk-nav-side uk-nav-parent-icon" data-uk-nav>
                            @yield('submenu')                            
                        </ul>

                    </div>
                    
                </div>
                <!-- Insertar contenido sub-menu [Fin] -->             
            

            <div class="tm-footer">
                <div class="uk-container uk-text-center">
                    @yield('footer')
                </div>
            </div>

        </div>

                

            <!-- Menu responsive -->
            <div id="offcanvas" class="uk-offcanvas">
                <div class="uk-offcanvas-bar">
                    <ul class="uk-nav uk-nav-offcanvas">
                        <li><a href="" class="uk-navbar-nav-subtitle">
                            <i class="uk-icon-home"></i> Home
                            <div>Pagina Inicio</div>
                        </a></li>

                        <li class="uk-parent" data-uk-dropdown>
                            <a href="" class="uk-navbar-nav-subtitle"><i class="uk-icon-cog"></i> Administrar
                             <div>Parametros del Sistema</div>
                            <div class="uk-dropdown uk-dropdown-navbar">
                                <ul class="uk-nav uk-nav-navbar">
                                    <li><a href="#">Diccionario de Datos </a></li>
                                    <li class="uk-nav-header">Materias</li>
                                    <li><a href="#">Cargar Materias</a></li>
                                    <li><a href="#">Cargar materias a profesores</a></li>
                                    <li><a href="#">Materias de grupo</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li class="uk-nav-header">Base datos inicial</li>
                                    <li><a href="#">Carreras</a></li>
                                    <li><a href="#">Profesores</a></li>
                                    <li><a href="#">Salones</a></li>
                                </ul>
                            </div>
                         </a></li>

                         <li class="uk-parent" data-uk-dropdown>
                            <a href="" class="uk-navbar-nav-subtitle"><i class="uk-icon-calculator"></i> Parametros Algoritmos
                             <div>Restricciones del Modelo</div>
                            <div class="uk-dropdown uk-dropdown-navbar">
                                <ul class="uk-nav uk-nav-navbar">
                                    <li><a href="#">Fijar parametros</a></li>
                                    <li class="uk-nav-header">Genetico</li>
                                    <li><a href="#">Fijar parametros</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li class="uk-nav-header">Busqueda Tabu</li>
                                    <li><a href="#">Fijar parametros</a></li>

                                </ul>
                            </div>
                         </a></li>

                         <li class="uk-parent" data-uk-dropdown>
                            <a href="" class="uk-navbar-nav-subtitle"><i class="uk-icon-calendar"></i> Horarios
                             <div>Consultar Horarios</div>
                            <div class="uk-dropdown uk-dropdown-navbar">
                                <ul class="uk-nav uk-nav-navbar">
                                    <li><a href="#">Consultar</a></li>
                                    <li><a href="#">Ejecutar Algoritmo</a></li>

                                </ul>
                            </div>
                         </a></li>

                        <li><a href="" class="uk-navbar-nav-subtitle">
                            <i class="uk-icon-question-circle"></i> Ayuda
                            <div>Manual sistema</div>
                        </a></li>

                        <li><a href="" class="uk-navbar-nav-subtitle">
                            <i class="uk-icon-sign-in"></i> Login
                            <div>Iniciar Sesion</div>
                        </a></li>

                        <li><a href="" class="uk-navbar-nav-subtitle">
                            <i class="uk-icon-sign-out"></i> Logout
                            <div>Cerrar Sesion</div>
                        </a></li>
                    </ul>                    
                </div>
            </div>
            <!-- Menu responsive [Fin] -->
    </body>
</html>