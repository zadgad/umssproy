<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="index.html">
            <div class="logo-img">
               <img src="{{ asset('proyect/img/syste.JPG') }}" class="header-brand-img" alt="lavalite">
            </div>
            <span class="text">SistenConst</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Funciones Usuario {{session()->get('rol')->first()}}</div>
                <div class="nav-item">
                    @if(session()->get('user_rol')->first()==1)
                    <a href="{{route('inicio',$id=session()->get('nombre')->first())}}"><i class="ik ik-home"></i><span>Inicio</span></a>
                    @else
                     @if(session()->get('user_rol')->first()==2)
                     <a href=""><i class="ik ik-home"></i><span>Inicio</span></a>
                     @else
                     @if(session()->get('user_rol')->first()>2)
                     <a href="{{ route('inius',$id=session()->get('nombre')->first()) }}"><i class="ik ik-home"></i><span>Inicio</span></a>
                     @endif
                    @endif
                    @endif
                    </div>
                <div class="nav-item has-sub" id="depst0" style="display: none">
                    <a href="#"><i class="ik ik-users"></i><span>Lista De Usuarios</span> <span class="badge badge-danger"></span></a>
                    <div class="submenu-content">
                        <a id="depst1" style="display: none" id="añadir_us" href="{{route('formulario')}}" class="menu-item">Añadir Usuario</a>
                        <a id="depst2" style="display: none" id="list_a"    href="{{route('list_ad')}}"    class="menu-item">Lista de Administradores</a>
                        <a id="depst3" style="display: none" id="list_e"    href="{{route('list_em')}}"    class="menu-item">Lista de Empledos</a>
                        <a id="depst4" style="display: none" id="list_u"    href="{{route('list')}}"       class="menu-item">Lista de Ususarios</a>
                        <a id="depst5" style="display: none" id="list_g"    href="{{route('listUs')}}"     class="menu-item">Lista de Usuarios Goblal</a>

                    </div>
                </div>
                <div class="nav-item has-sub" id="depst6" style="display: none">
                    <a href="#"><i class="ik ik-bar-chart-2"></i><span>Proyectos</span></a>
                    <div class="submenu-content">
                        <div class="submenu-content">
                            <a id="depst7" style="display: none"  href="{{route('formulpro')}}" class="menu-item">Formulario de Proyectos</a>
                            <a id="depst8" style="display: none"  href="{{route('tabpro')}}" class="menu-item">Tabla de Proyectos</a>
                            <a id="depst9" style="display: none"  href="{{route('formunid')}}" class="menu-item">Formulario de Unidad</a>
                            <a id="depst10" style="display: none"  href="{{route('tabItem')}}" class="menu-item">Tabla de U-Subproyectos</a>
                            <a id="depst11" style="display: none"  href="{{route('tabUnides')}}" class="menu-item">Tabla de U-Medida</a>
                            <a id="depst12" style="display: none"  href="{{route('añadirp')}}" class="menu-item">Actulizar Precio</a>
                            <a id="depst13" style="display: none"  href="{{route('añadirsub')}}" class="menu-item">Añadir Subproyecto</a>
                            <a id="depst14" style="display: none"  href="{{route('tablaunid')}}" class="menu-item">Tabla de Items</a>
                            <a id="depst15" style="display: none"  href="{{route('tablasub')}}" class="menu-item">tabla de Subproyecto</a>

                        </div>
                    </div>
                </div>
                <div class="nav-item has-sub" id="dep" style="display: none">
                    <a href="#"><i class="ik ik-bar-chart-1"></i><span>Registros de Actividades</span></a>
                    <div class="submenu-content">
                        <div class="submenu-content">
                            <a  href="{{route('regIns')}}" class="menu-item">Registro de Insert</a>
                            <a  href="{{route('regUp')}}" class="menu-item">Registro de Update</a>
                            <a  href="{{route('regDel')}}" class="menu-item">Registro de Del</a>

                        </div>
                    </div>
                </div>

                {{-- <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-bar-chart-2"></i><span>Depar. y Ciudades</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('ListD') }}" class="menu-item">Lista de Departamentos</a>
                        <a href="{{route('listCiu')}}" class="menu-item">Lista de Ciudades</a>

                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-grid"></i><span>Vias</span> <span class="badge badge-success"></span></a>
                    <div class="submenu-content">
                        <a href="{{route('añadir_via')}}" class="menu-item">Añadir Vias</a>
                        <a href="{{route('list_vias')}}" class="menu-item">Lista de Vias</a>

                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-truck"></i><span>Vehiculos</span></a>
                    <div class="submenu-content">
                        <a href="{{route('añadir_vehi')}}" class="menu-item">Añadir Vehiculos</a>
                        <a href="{{route('list_vehic')}}" class="menu-item">Tipos de Vehiculos</a>

                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-radio"></i><span>Sensores</span></a>
                    <div class="submenu-content">
                        <a href="{{route('añadirS')}}" class="menu-item">Añadir Sensor</a>
                        <a href="{{route('list_senores')}}" class="menu-item">Lista de Sensores</a>
                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-clipboard"></i><span>Ubicacion</span></a>
                    <div class="submenu-content">
                        <a href="{{route('añadirubica')}}" class="menu-item">Añadir Ubicacion</a>
                        <a href="{{route('listUbication')}}" class="menu-item">Lista de Ubicaciones</a>
                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-pie-chart"></i><span>Estadistica</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('formEsta') }}" class="menu-item">Formulario De Busqueda</a>
                        <a href="{{ route('aforo') }}" class="menu-item">Tablas de AFORO</a>
                        <a href="form-components.html" class="menu-item">Registro de Ubicacion</a>
                        <a href="form-components.html" class="menu-item">Cuadoes Estadisticos</a>
                        <a href="{{ route('registerD') }}" class="menu-item">Recoleccion de Datos</a>

                    </div>
                </div>
                <div class="nav-item">
                    <a href="table-datatable.html"><i class="ik ik-map-pin"></i><span>Google Maps</span></a>
                </div>

                <div class="nav-lavel">Simulacion</div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-cpu"></i><span>Simulador</span> <span class="badge badge-success"></span></a>
                    <div class="submenu-content">
                        <a href="{{ route('formularioSim') }}" class="menu-item">Generar Datos</a>
                        <a href="charts-flot.html" class="menu-item">Tablas</a>
                    </div>
                </div> --}}

                <div class="nav-item">
                    <a href="javascript:void(0)"><i class=""></i><span></span></a>
                </div>
            </nav>
        </div>
    </div>
</div>
