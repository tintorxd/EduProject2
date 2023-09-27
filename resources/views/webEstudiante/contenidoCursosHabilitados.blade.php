@extends('webEstudiante/cursosHabilitados')

@section('contenido_cursos')
    @if (empty($detalle_curso))
        <div class="row mt-3">
            @foreach ($cursos as $curso)
                <div class="col-md-3 mx-2 my-2">
                    <div class="card card-curso" style="width: 18rem;" data-bs-trigger="manual" data-bs-html="true"
                        data-bs-toggle="popover">
                        @if ($curso->img != null)
                            <img src="{{ URL::asset('storage/imgCursos/' . $curso->img) }}" class="card-img-top" alt="..."
                                style="height: 160px;">
                        @else
                            <img src="{{ URL::asset('assets/img/imagen_vacia.jpg') }}" class="card-img-top" alt="..."
                                style="height: 160px;">
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
                                    <div class="col-md-6  fs-5">
                                        <strong>
                                            ADQUIRIDO
                                        </strong>
                                    </div>
                                    <div class="col-md-5">
                                        <a role="button" href="{{ route('detalleCurso.show', ['id' => $curso->id_ch]) }}"
                                            class="btn btn-primary">Ver curso</a>
                                    </div>
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
        @php
            $curso = $detalle_curso[0];
            $semana = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
            $horario = explode(',', $curso->horario);
            $dias = explode(',', $curso->dias);
        @endphp

        {{-- Contenido del Curso seleccionado --}}

        <div class="card" id="card-detalle-habilitado">

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
                    <a href="#" class="btn" style="background-color: #0d6efd; color: white" type="button">Entrar a
                        curso</a>
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
        {{-- End Cart --}}


        <div class="main-contenido-habilitado">
            <div class="detalle-curso-contenido-habilitado">
                <h2>Horario del Curso</h2>
                <p>En este curso aprenderas de las direferentes areas:</p>
                <div class="contenedor-tabla">
                    <table class=" table table-bordered table-horario">
                        <thead>

                            <th>Lunes</th>
                            <th>Martes</th>
                            <th>Miércoles</th>
                            <th>Jueves</th>
                            <th>Viernes</th>
                            <th>Sábado</th>
                            <th>Domingo</th>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($semana as $dia)
                                    <td>
                                        @foreach ($dias as $diaHabilitado)
                                            @if ($dia == $diaHabilitado)
                                                hrs: <br>{{ $horario[$loop->index] }}
                                            @else
                                            @endif
                                        @endforeach
                                    </td>
                                @endforeach
                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>
            <div class="detalle-curso-contenido-habilitado mt-4">
                <h2>Contenido del Curso</h2>
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
            <div class="detalle-curso-contenido-habilitado mt-4">
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
    @endif
@endsection
