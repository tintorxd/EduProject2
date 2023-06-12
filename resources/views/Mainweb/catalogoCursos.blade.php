@extends('layout/plantilla')

@section('tituloPagina', 'Fundetic Website')

@section('contenido')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

                <ul class="menu-inner py-1">


                    <li class="menu-item  ">
                        <a href="{{ route('Admin.page') }}" role='button' class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Mostrar Todos</div>
                        </a>
                    </li>
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">SEMINARIOS</span>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Informatica</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('content.dashboard', ['folder' => 'estudiante', 'content' => 'estuRegister']) }}"
                                    class="menu-link">
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

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                            <div data-i18n="Authentications">Gestion de Empresas</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="auth-login-basic.html" class="menu-link" target="_blank">
                                    <div data-i18n="Basic">Login</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-register-basic.html" class="menu-link" target="_blank">
                                    <div data-i18n="Basic">Register</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
                                    <div data-i18n="Basic">Forgot Password</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Docentes -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">TALLERES</span></li>

                    <!-- User interface -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="User interface">Informatica</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('content.dashboard', ['folder' => 'docente', 'content' => 'docenteRegister']) }}"
                                    class="menu-link">
                                    <div data-i18n="Account">Registrar nuevo docente</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('registerDocente.show', ['content' => 'docenteTable']) }}"
                                    class="menu-link">
                                    <div data-i18n="Notifications">Visualizar docentes</div>
                                </a>
                            </li>
                        </ul>
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="User interface">Gestion de Empresas</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('content.dashboard', ['folder' => 'docente', 'content' => 'docenteRegister']) }}"
                                    class="menu-link">
                                    <div data-i18n="Account">Registrar nuevo docente</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('registerDocente.show', ['content' => 'docenteTable']) }}"
                                    class="menu-link">
                                    <div data-i18n="Notifications">Visualizar docentes</div>
                                </a>
                            </li>
                        </ul>
                    </li>




                    <!-- Forms & Tables -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">CAPACITACIONES</span></li>
                    <!-- Forms -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-detail"></i>
                            <div data-i18n="Form Elements">Informatica</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('content.dashboard', ['folder' => 'adminuser', 'content' => 'userRegister']) }}"
                                    class="menu-link">
                                    <div data-i18n="Registrar administrador">Registrar administrador</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('registerAdmin.show', ['content' => 'userTable']) }}" class="menu-link">
                                    <div data-i18n="Input groups">Visualizar administradores</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-detail"></i>
                            <div data-i18n="Form Layouts">Gestion de Empresas</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="form-layouts-vertical.html" class="menu-link">
                                    <div data-i18n="Vertical Form">Vertical Form</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="form-layouts-horizontal.html" class="menu-link">
                                    <div data-i18n="Horizontal Form">Horizontal Form</div>
                                </a>
                            </li>
                        </ul>
                    </li>
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
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper container">
                    <!-- Content -->

                    @if ($cursos)
                        <div class="row mt-3">


                            @foreach ($cursos as $curso)
                                <div class="col-md-3 mx-2 my-2">
                                    <div class="card card-curso" style="width: 18rem;" data-bs-trigger="manual"
                                        data-bs-html="true" data-bs-toggle="popover">
                                        @if ($curso->img != null)
                                            <img src="{{ URL::asset('storage/imgCursos/' . $curso->img) }}"
                                                class="card-img-top" alt="..." style="height: 160px;">
                                        @else
                                            <img src="{{ URL::asset('assets/img/imagen_vacia.jpg') }}"
                                                class="card-img-top" alt="..." style="height: 160px;">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title text-truncate">{{ $curso->titulo }}</h5>
                                            <p class="card-text fw-light fs-6 text-truncate">
                                                {{ $curso->names . ' ' . $curso->lastnames }}
                                            </p>
                                            <div class="star-rating">
                                                4.7
                                                <input id="star-1" type="radio" name="rating" value="1" />
                                                <label for="star-1" title="1 star">
                                                    <i class="active fa fa-star"></i>
                                                </label>
                                                <input id="star-2" type="radio" name="rating" value="2" />
                                                <label for="star-2" title="2 stars">
                                                    <i class="active fa fa-star"></i>
                                                </label>
                                                <input id="star-3" type="radio" name="rating" value="3" />
                                                <label for="star-3" title="3 stars">
                                                    <i class="active fa fa-star"></i>
                                                </label>
                                                <input id="star-4" type="radio" name="rating" value="4" />
                                                <label for="star-4" title="4 stars">
                                                    <i class="active fa fa-star"></i>
                                                </label>
                                                <input id="star-5" type="radio" name="rating" value="5" />
                                                <label for="star-5" title="5 stars">
                                                    <i class="active fa fa-star"></i>
                                                </label>
                                            </div>

                                            <div class="fs-4  fst-italic mt-1">
                                                <div class="row">

                                                    @if (auth('students')->check())
                                                        <div class="col-md-6  fs-2">
                                                            <strong>
                                                                {{ $curso->costo }} Bs.
                                                            </strong>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <a role="button"
                                                                href="{{ route('detalleCurso.show', ['id' => $curso->id_ch]) }}"
                                                                class="btn btn-primary">Inscribirme</a>
                                                        </div>
                                                    @else
                                                        <div class="col-md-6 fs-2">
                                                            <strong>
                                                                {{ $curso->costo }} Bs.
                                                            </strong>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <button type="button"
                                                                class="btn btn-primary openLogin">Inscribirme</button>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="popercard" style="display: none;">
                                        <h3>{{ $curso->titulo }}</h3>
                                        <p>Lo expone: {{ $curso->names . ' ' . $curso->lastnames }}.</p>
                                        <p>Duracion de {{ $curso->duracion . ' ' . $curso->unidad_duracion }}</p>

                                        <p>{{ $curso->descripcion }}</p>
                                        <ul>
                                            <li>Elemento 1</li>
                                            <li>Elemento 2</li>
                                            <li>Elemento 3</li>
                                        </ul>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center" style="margin-top: 40px">
                            <h1>
                                Aun no hay cursos habilitados
                            </h1>

                        </div>

                    @endif
                    {{-- @include($sub_page) --}}

                    <!-- / Content -->




                </div>

                <!-- Content wrapper -->

            </div>
            <!-- / Layout page -->
        </div>
    </div>


@endsection
