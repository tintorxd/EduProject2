<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>

    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
</svg>
<div class="container" style="padding: 40px">
    <div class="row">
        <div class="col-md-6">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Seminario/</span> Tabla Seminarios
                Habilitados
            </h4>
        </div>
        <div class="offset-md-3 col-md-3">
            @if (session('action') == 'error')
                <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                        aria-label="Danger:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        {{ session('mensage') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('action') == 'success')
                <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                        aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        {{ session('mensage') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <table id="seminariosTable" class="display table responsive nowrap " style="width:100%">
            <thead>
                <tr>
                    <th>Curso</th>
                    <th>Titulo</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Culminación</th>
                    <th>Estado</th>
                    <th>Total inscritos</th>
                    <th>Docente a cargo</th>
                    <th>Aciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach (session('cursos') as $seminario)
                    <tr>
                        <td>{{ ucwords($seminario->tipo_curso) }}</td>
                        <td>{{ $seminario->titulo }}</td>
                        <td>{{ $seminario->fecha_habilitacion }}</td>
                        <td>{{ $seminario->fecha_culminacion }}</td>
                        <td>@php
                            switch ($seminario->estado) {
                                case 0:
                                    echo '<span class="badge bg-primary">Por Iniciar</span>';
                                    break;
                                case 1:
                                    echo '<span class="badge bg-success">En Curso</span>';
                                    break;
                                case 2:
                                    echo '<span class="badge bg-secondary">Terminado</span>';
                                    break;
                            }
                        @endphp </td>
                        <td>{{ $seminario->total_inscritos }}</td>
                        <td>{{ $seminario->names . ' ' . $seminario->lastnames }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a href="{{ route('registerCurso.enableView', ['id' => $seminario->id, 'folder' => 'seminarios']) }}"
                                        class="dropdown-item" type="button"><i class="fa-solid fa-check"></i>
                                        Habilitar seminario</a>
                                    <form
                                        action="{{ route('registerCurso.edit', ['id' => $seminario->id, 'folder' => 'seminarios']) }}"
                                        method="post">
                                        @csrf
                                        <button class="dropdown-item" type="submit"><i class="bx bx-edit-alt me-1"></i>
                                            Modificar</button>
                                    </form>
                                    <form
                                        action="{{ route('registerCurso.delete', ['id' => $seminario->id, 'tipo' => $seminario->tipo_curso, 'folder' => 'seminarios']) }}"
                                        method="post">
                                        @csrf
                                        <button class="dropdown-item" type="submit"><i
                                                class="bx bx-trash me-1"></i>Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th>Curso</th>
                    <th>Titulo</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Culminación</th>
                    <th>Estado</th>
                    <th>Total inscritos</th>
                    <th>Docente a cargo</th>
                    <th>Aciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#seminariosTable').DataTable({
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
    </script>
