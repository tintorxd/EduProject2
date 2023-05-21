@if (auth('students')->check())
    @extends('layout/plantilla')

    @section('tituloPagina', 'Fundetic Website')

    @section('contenido')

        <div class="encabezado-detalle">

            <div class="card" id="card-detalle">

                @if ($curso->img != null)
                    <img src="{{ URL::asset('storage/imgCursos/' . $curso->img) }}" class="card-img-top" alt="..."
                        style="height: 190px;">
                @else
                    <img src="{{ URL::asset('assets/img/imagen_vacia.jpg') }}" class="card-img-top" alt="..."
                        style="height: 190px;">
                @endif

                <div class="card-body">
                    <h1 class="card-title">Bs. {{ number_format($curso->costo, 2, '.', ',') }}</h1>
                    <div class="d-grid gap-2 mt-3">
                        <input name="" id="" class="btn" style="background-color: #0d6efd; color: white"
                            type="button" value="Comprar Ahora">
                    </div>
                </div>
                <hr>
                <div class="container listado-contenido">
                    <h3>Este curso incluye</h3>
                    <ul>
                        <li><i class="fa-solid fa-award"></i> Certificacion por 30hr academicas </li>
                        <li><i class="fa-solid fa-book"></i> Toda la documentación necesaria </li>
                        <li><i class="fa-solid fa-book"></i> Toda la documentación necesaria </li>
                        <li><i class="fa-solid fa-book"></i> Toda la documentación necesaria </li>
                    </ul>
                    <hr>
                    <div class="row mb-3 links-detalle-curso">
                        <div class="offset-md-2 col-md-4 "><a href="">Compartir</a></div>
                        <div class="col-md-6"><a href="">Referidos</a></div>
                    </div>
                </div>
            </div>
            <div class="encabezado-contenido">
                <div class="row">
                    <div class=" col-md-6">

                        <h1 style="color: white">{{ $curso->titulo }}</h1>
                        <div class="fs-5 mb-3" style="text-align: justify;"> {{ $curso->descripcion }} </div>
                        <div class="star-rating mb-2" style="font-size: 13px">
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

                            100 estudiantes
                        </div>
                        <div class="mb-2">Creado por <strong>{{ $curso->names . ' ' . $curso->lastnames }}</strong></div>
                        <div class="mb-2">
                            <i class="fa-solid fa-calendar"></i> Ultima actualización
                            {{ Str::substr($curso->updated_at, 0, 10) }}
                            <i class="fa-solid fa-globe ms-3"></i> Español
                        </div>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>

            </div>
        </div>

        <div class="main-contenido">
            <div class="detalle-curso-contenido">
                <h2>¿Que aprenderas?</h2>
                <p>En este curso aprenderas de las direferentes areas:</p>
                <div class="row">
                    <div class="col-md-6 listado-contenido">
                        <ul>
                            <li>
                                <i class="fa-solid fa-check"></i> Principios Basicos
                            </li>
                            <li>
                                <i class="fa-solid fa-check"></i> Conceptos de programación
                            </li>
                            <li>
                                <i class="fa-solid fa-check"></i> Ejemplos de proyectos
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 listado-contenido">
                        <ul>
                            <li>
                                <i class="fa-solid fa-check"></i> Principios Basicos
                            </li>
                            <li>
                                <i class="fa-solid fa-check"></i> Conceptos de programación
                            </li>
                            <li>
                                <i class="fa-solid fa-check"></i> Ejemplos de proyectos
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="detalle-curso-contenido mt-4">
                <h2>Conocimientos para el curso</h2>
                <p>Estos conocimientos facilitaran el entendimiento de los temas que se abordaran en el curso.</p>
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li>
                                Principios Basicos
                            </li>
                            <li>
                                Conceptos de programación
                            </li>
                            <li>
                                Ejemplos de proyectos
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li>
                                Principios Basicos
                            </li>
                            <li>
                                Conceptos de programación
                            </li>
                            <li>
                                Ejemplos de proyectos
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="detalle-curso-docente mt-3">
                <h2>Instructor</h2>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <h5><strong>{{ $curso->names . ' ' . $curso->lastnames }}</strong></h5>
                        <div>{{ $curso->degree_lv }}</div>
                        <img id="docente_preview" src="{{ URL::asset('storage/imgDocentes/' . $curso->imgDocente) }}"
                            width="150px" height="150px" style="border-radius: 50%; margin-top:5px">

                    </div>
                    <div class="col-md-6 listado-contenido ul li">
                        <ul>
                            <li><i class="fa-solid fa-play"></i> 40 Cursos</li>
                            <li><i class="fa-solid fa-people-group"></i> 40 Estudiantes</li>
                        </ul>
                    </div>

                </div>
                <div class="row">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium iusto esse rerum tempora
                    blanditiis
                    fugiat commodi voluptatum eligendi ipsum, debitis, cupiditate cumque? Non sed facere ad, nostrum esse at
                    aspernatur.
                </div>

            </div>
        </div>

    @endsection
@else
    @php
        return view('adminLogin');
    @endphp
@endif
