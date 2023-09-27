@extends('layout/main_menu_docente_template')

@section('tituloPagina', 'Portal Docente')
@php
    $total_cursos = count($seminarios) + count($talleres) + count($seminarios);
@endphp

@section('sidebar')
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Cursos</span></li>
    <!-- Forms -->
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-detail"></i>
            <div data-i18n="Form Elements">Seminarios</div>
        </a>
        <ul class="menu-sub">
            @if (count($seminarios) > 0)
                @foreach ($seminarios as $seminario)
                    <li class="menu-item">
                        <a href="{{ route('docente.curso_manager', ['id' => $seminario['id']]) }}" class="menu-link">
                            <div data-i18n="Basic Inputs">{{ $seminario['titulo'] }}</div>
                        </a>
                    </li>
                @endforeach
            @else
                <span>No tienes asignado ningun seminario.</span>
            @endif
        </ul>
    </li>
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-detail"></i>
            <div data-i18n="Form Layouts">Talleres</div>
        </a>
        <ul class="menu-sub">
            @if (count($talleres) > 0)
                @foreach ($talleres as $talleres)
                    <li class="menu-item">
                        <a href="{{ route('docente.curso_manager', ['id' => $talleres['id']]) }}" class="menu-link">
                            <div data-i18n="Basic Inputs">{{ $talleres['titulo'] }}</div>
                        </a>
                    </li>
                @endforeach
            @else
                <span>No tienes asignado ningun taller.</span>
            @endif
        </ul>
    </li>
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-detail"></i>
            <div data-i18n="Form Layouts">Capacitaciones</div>
        </a>
        <ul class="menu-sub">
            @if (count($capacitaciones) > 0)
                @foreach ($capacitaciones as $capacitacion)
                    <li class="menu-item">
                        <a href="{{ route('docente.curso_manager', ['id' => $capacitacion['id']]) }}" class="menu-link">
                            <div data-i18n="Basic Inputs">{{ $capacitacion['titulo'] }}</div>
                        </a>
                    </li>
                @endforeach
            @else
                <li class="menu-item">
                    <span class="menu-link text-wrap">No tienes asignado ningun taller.</span>
                </li>

            @endif

        </ul>
    </li>
@endsection

@section('contenido')


    <div class="row my-3">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                {{ auth('docenteadmin')->user()->names . ' ' . auth('docenteadmin')->user()->lastnames }}🎉
                            </h5>
                            <p class="mb-4">Tienes un total de <span class="fw-bold">{{ $total_cursos }}</span> Cursos
                                asignados
                                hoy. <br> Y muchos estudiantes emocionados por que les compartas tu conocimiento</p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if ($seminarios)
            <div style="margin-left: 50px">
                <h2>Seminarios</h2>
            </div>



            @foreach ($seminarios as $curso)
                <div class="col-md-3 mx-2 my-2">
                    <div class="card card-curso" style="width: 18rem;" data-bs-trigger="manual" data-bs-html="true"
                        data-bs-toggle="popover">
                        @if ($curso['img'] != null)
                            <img src="{{ URL::asset('storage/imgCursos/' . $curso['img']) }}" class="card-img-top"
                                alt="..." style="height: 160px;">
                        @else
                            <img src="{{ URL::asset('assets/img/imagen_vacia.jpg') }}" class="card-img-top" alt="..."
                                style="height: 160px;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $curso['titulo'] }}</h5>
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

                        </div>
                    </div>


                </div>
            @endforeach

        @endif
    </div>
    <div class="row">
        @if ($capacitaciones)
            <div style="margin-left: 50px">
                <h2>Capacitaciones </h2>
            </div>



            @foreach ($capacitaciones as $curso)
                <div class="col-md-3 mx-2 my-2">
                    <div class="card card-curso" style="width: 18rem;" data-bs-trigger="manual" data-bs-html="true"
                        data-bs-toggle="popover">
                        @if ($curso['img'] != null)
                            <img src="{{ URL::asset('storage/imgCursos/' . $curso['img']) }}" class="card-img-top"
                                alt="..." style="height: 160px;">
                        @else
                            <img src="{{ URL::asset('assets/img/imagen_vacia.jpg') }}" class="card-img-top"
                                alt="..." style="height: 160px;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $curso['titulo'] }}</h5>
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

                        </div>
                    </div>

                </div>
            @endforeach

        @endif
    </div>
    <div class="row">
        @if ($talleres)
            <div style="margin-left: 50px">
                <h2>Talleres</h2>
            </div>

            @foreach ($talleres as $curso)
                <div class="col-md-3 mx-2 my-2">
                    <div class="card card-curso" style="width: 18rem;" data-bs-trigger="manual" data-bs-html="true"
                        data-bs-toggle="popover">
                        @if ($curso['img'] != null)
                            <img src="{{ URL::asset('storage/imgCursos/' . $curso['img']) }}" class="card-img-top"
                                alt="..." style="height: 160px;">
                        @else
                            <img src="{{ URL::asset('assets/img/imagen_vacia.jpg') }}" class="card-img-top"
                                alt="..." style="height: 160px;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $curso['titulo'] }}</h5>
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
                        </div>
                    </div>


                </div>
            @endforeach

        @endif
    </div>




@endsection
