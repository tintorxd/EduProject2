@extends('layout/plantilla')

@section('tituloPagina', 'Fundetic Website')

@section('contenido')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

                <ul class="menu-inner">


                    <li class="menu-item text-center pt-3 fw-bold">
                        <h4>Cursos Adquiridos</h4>
                    </li>
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">SEMINARIOS</span>
                    </li>

                    @foreach ($cursos as $curso)
                        @if ($curso->tipo_curso == 'seminario')
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <div data-i18n="Account Settings">{{ $curso->titulo }}</div>
                                </a>
                                <ul class="menu-sub">
                                    <img src="{{ URL::asset('storage/imgCursos/' . $curso->img) }}" alt=""
                                        class="img-sidenav">
                                    <li class="menu-item">
                                        <a href="{{ route('webestu.cursos', ['id' => $curso->id_ch]) }}" class="menu-link">
                                            <div data-i18n="Account">Ver contenido de seminario</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('registerEstudent.show', ['content' => 'estudianteTable']) }}"
                                            class="menu-link">
                                            <div data-i18n="Notifications">Visualizar Notas</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="pages-account-settings-connections.html" class="menu-link">
                                            <div data-i18n="Connections">Documentos complementarios</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @endforeach




                    <!-- Docentes -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">TALLERES</span></li>

                    @foreach ($cursos as $curso)
                        @if ($curso->tipo_curso == 'taller')
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                                    <div data-i18n="Account Settings">{{ $curso->titulo }}</div>
                                </a>
                                <ul class="menu-sub">
                                    <img src="{{ URL::asset('storage/imgCursos/' . $curso->img) }}" alt=""
                                        class="img-sidenav">
                                    <li class="menu-item">
                                        <a href="{{ route('webestu.cursos', ['id' => $curso->id_ch]) }}" class="menu-link">
                                            <div data-i18n="Account">Registrar nuevo estudiante</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('registerEstudent.show', ['content' => 'estudianteTable']) }}"
                                            class="menu-link">
                                            <div data-i18n="Notifications">Visualizar estudiantes</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="pages-account-settings-connections.html" class="menu-link">
                                            <div data-i18n="Connections">Connections</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @endforeach




                    <!-- Forms & Tables -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">CAPACITACIONES</span></li>
                    <!-- Forms -->
                    @foreach ($cursos as $curso)
                        @if ($curso->tipo_curso == 'capacitacion')
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                                    <div data-i18n="Account Settings">{{ $curso->titulo }}</div>
                                </a>
                                <ul class="menu-sub">
                                    <img src="{{ URL::asset('storage/imgCursos/' . $curso->img) }}" alt=""
                                        class="img-sidenav">
                                    <li class="menu-item">
                                        <a href="{{ route('webestu.cursos', ['id' => $curso->id_ch]) }}" class="menu-link">
                                            <div data-i18n="Account">Registrar nuevo estudiante</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('registerEstudent.show', ['content' => 'estudianteTable']) }}"
                                            class="menu-link">
                                            <div data-i18n="Notifications">Visualizar estudiantes</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="pages-account-settings-connections.html" class="menu-link">
                                            <div data-i18n="Connections">Connections</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </aside>

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    style="width: 700px !important" id="layout-navbar">


                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                                    aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->


                    </div>
                    <div class="mt-3 d-flex" style="flex-direction: row-reverse; ">

                        @if (session('status') == 'error')
                            <div class="alert alert-danger d-flex align-items-center" style="flex-direction: row-reverse;"
                                role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                    aria-label="Danger:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>
                                <div>
                                    {{ session('mensage') }}
                                </div>

                            </div>
                        @endif
                        @if (session('status') == 'success')
                            <div class="alert alert-success  d-flex align-items-center text-center"
                                style="flex-direction: row-reverse;" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                    aria-label="Success:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>
                                <div>
                                    {{ session('mensage') }}
                                </div>

                            </div>
                        @endif
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper container" style="margin-left:30px">
                    <!-- Content -->



                    @yield('contenido_cursos')

                    <!-- / Content -->



                    <!-- //////////////// -->
                </div>

                <!-- Content wrapper -->

            </div>
            <!-- / Layout page -->
        </div>
    </div>
@endsection
