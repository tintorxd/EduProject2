@extends('layout/main_menu_docente_template')

@section('tituloPagina', 'Portal Docente')
@php
    $total_cursos = count($seminarios) + count($talleres) + count($seminarios);
    
    $curso_seleccionado = $curso[0];
    $semana = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
    $horario = explode(',', $curso_seleccionado['horario']);
    $dias = explode(',', $curso_seleccionado['dias']);
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
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">
                                    {{ auth('docenteadmin')->user()->names . ' ' . auth('docenteadmin')->user()->lastnames }}🎉
                                </h5>
                                <p class="mb-4">Tienes un total de <span class="fw-bold">{{ $total_cursos }}</span>
                                    asignados
                                    hoy. <br> Y muchos estudiantes emocionados por que les compartas tu conocimiento</p>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="../../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                    alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                    type="button" role="tab" aria-controls="contact" aria-selected="false">Curso</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link " id="estudiantes-tab" data-bs-toggle="tab" data-bs-target="#estudiantes"
                    type="button" role="tab" aria-controls="estudiantes" aria-selected="true">Estudiantes</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="notas-tab" data-bs-toggle="tab" data-bs-target="#notas" type="button"
                    role="tab" aria-controls="notas" aria-selected="false">Notas</button>
            </li>
        </ul>
        {{-- TAB ESTUDIANTES --}}
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade " id="estudiantes" role="tabpanel" aria-labelledby="estudiantes-tab">
                <table id="estudiantes_table" class="table table-striped display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre Completo</th>
                            <th>Correo</th>
                            <th>N° Telefono</th>

                            <th>Fecha de Inscripcion</th>
                            <th>Fecha de Registro</th>
                            <th>Aciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estudiantes as $estudiante)
                            <tr>
                                <td>{{ $estudiante->names . ' ' . $estudiante->lastnames }}</td>
                                <td>{{ $estudiante->email }}</td>
                                <td>{{ $estudiante->phone_number }}</td>
                                <td>{{ $estudiante->fecha_inscripcion }}</td>
                                <td>{{ $estudiante->created_at }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            title="Desplegar menu" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form action="{{ route('registerEstudent.edit', ['id' => $estudiante->id]) }}"
                                                method="post">
                                                @csrf
                                                <button class="dropdown-item"
                                                    style="padding-top:10px; padding-bottom:10px" type="submit"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Ver notas detalle</button>
                                            </form>
                                            {{-- <form
                                                action="{{ route('registerEstudent.delete', ['id' => $estudiante->id]) }}"
                                                method="post">
                                                @csrf
                                                <button class="dropdown-item"
                                                    style="padding-top:10px; padding-bottom:10px" type="submit"><i
                                                        class="bx bx-trash me-1"></i>Delete</button>
                                            </form> --}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre Completo</th>
                            <th>Correo</th>
                            <th>N° Telefono</th>
                            <th>Dirección</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Fecha de Registro</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            {{-- TAB NOTAS --}}
            <div class="tab-pane fade " id="notas" role="tabpanel" aria-labelledby="notas-tab">
                <div class="row mb-2">
                    <div class="offset-md-2">
                        <button class="btn btn-success" id="add_partials"><i class="fa-solid fa-plus"></i></button>
                        <button class="btn btn-danger d-none" id="delete_partials"><i
                                class="fa-solid fa-minus"></i></button>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-1 text-center mt-3 ">
                        <button class="btn btn-success" id="add_tasks"><i class="fa-solid fa-plus"></i></button>
                        <br>
                        <button class="btn btn-danger mt-1 d-none" id="delete_tasks"><i
                                class="fa-solid fa-minus"></i></button>
                    </div>
                    <div class="col-md-11">
                        <div class="table-responsive">
                            <table class="table" id='notes_table'>
                                <thead>
                                    <tr>
                                        <th scope="col" data-columna='1'>Parcial N°1</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="partial_percentage">
                                        <td scope="row"><input class='percentage_notes_input form-control'
                                                type='text' value='100%' oninput="agregarPorcentaje(this);"
                                                style='width: 65px'>
                                        </td>
                                    </tr>
                                    <tr class="task_partial">
                                        <td scope="row" class="text-right"><input type="text" class="form-control"
                                                style="width: 150px" placeholder="Nombre Tarea"></td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">Total</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Guardar estructura de notas</button>
                    </div>
                </div>




            </div>

            {{-- TAB CURSO --}}
            <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="col-md-6">
                        <div class="detalle-curso-contenido-habilitado">
                            <h2>Horario del Curso</h2>

                            <table class=" table table-bordered table-horario bg-light">
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
                    <div class="col-md-6"></div>
                </div>

            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('#estudiantes_table').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ filas por pagina",
                    "zeroRecords": "No se encontraron los registros",
                    "info": "Mostrando paginas _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay datos existentes",
                    "infoFiltered": "(filtrado de _MAX_ total registros)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },

            });
        });
        $(document).on('change', '.percentage_notes_input', function() {
            console.log("hola");
            let total = 0
            $('.partial_percentage td input').each(function() {
                num_sin_porcentaje = $(this).val().replace("%", "");
                total += parseInt(num_sin_porcentaje)
                console.log(`Total: ${total}`);

            });
            if (total > 100) {
                console.log("La sumatoria de todos los parciales deben dar como resultado 100%");
            }
        });

        $('#add_partials').on('click', function() {
            let n_col = $('#notes_table thead tr th').length + 1;
            $('#notes_table thead tr').append(`<th scope="col">Parcial N°${n_col}</th>`);
            $('.partial_percentage').append(
                `<td scope="row"><input class='percentage_notes_input form-control' type='text' value='0%' style='width: 65px' oninput="agregarPorcentaje(this);"></td>`
            );
            $('.task_partial').append(
                `<td scope="row" class="text-right"><input type="text" class="form-control"
                                        style="width: 150px" placeholder='Nombre Tarea'></td>`
            );
            $('#delete_partials').removeClass('d-none')
        });
        $('#add_tasks').on('click', function() {
            let n_col = $('#notes_table thead tr th').length + 1;
            let inputs = ''
            for (let index = 1; index < n_col; index++) {
                inputs +=
                    '<td scope="row" class="text-right"><input type="text" class="form-control" style="width: 150px" placeholder="Nombre Tarea"></td>'

            }
            $('#notes_table tbody').append(
                `<tr class="task_partial">${inputs}</tr>`
            );
            $('#delete_tasks').removeClass('d-none')

        });
        $('#delete_partials').on('click', function() {
            let n_col = $('#notes_table thead tr th').length;
            if (n_col == 1) {
                alert('No se puede eliminar esta columna')
                return
            }
            if (confirm('Desea eliminar el ultimo parcial?')) {
                $("#notes_table thead th:last").remove();

                // Para eliminar la última celda de cada fila en el cuerpo de la tabla, puedes hacerlo así:
                $("#notes_table tbody tr").each(function() {
                    $(this).find("td:last").remove();
                });
            }

        });
        $('#delete_tasks').on('click', function() {
            let n_col = $('#notes_table tbody tr').length;
            console.log(n_col);
            if (n_col == 2) {
                alert('No se puede eliminar esta fila')
                return
            }
            if (confirm('Desea eliminar la ultima tarea?')) {
                $("#notes_table tbody tr:last").remove();
            }

        });

        function agregarPorcentaje(input) {
            // Eliminar cualquier carácter que no sea número o porcentaje
            input.value = input.value.replace(/[^0-9%]/g, '');

            // Añadir "%" al final si no está presente
            if (!input.value.endsWith('%')) {
                input.value = input.value + '%';
            }
        }
    </script>
@endsection
