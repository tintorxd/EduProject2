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
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-6">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Seminario/</span> Habilitar</h4>
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
                        Estudiante Registrado Correctamente
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>
    @php
        $seminario = session('curso');
    @endphp

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-md-6">




            <div class="" style="max-with: 500px; padding-left: 10px;padding-right: 10px">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Nuevo curso</h5>
                        <small class="text-muted float-end">Seminario</small>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ route('registerCurso.update', ['id' => $seminario->id, 'tipo' => $seminario->tipo_curso, 'folder' => 'seminarios']) }}"
                            method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Titulo del Seminario</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" name="titulo"
                                        value="{{ $seminario->titulo }}" placeholder="Seminario de Informatica I"
                                        aria-label="Seminario de Informatica I"
                                        aria-describedby="basic-icon-default-fullname2" disabled />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Descripcion del
                                    seminario</label>
                                <div class="input-group input-group-merge">

                                    <textarea class="form-control" name="descripcion" placeholder="Breve descripcion del seminario"
                                        aria-label="Breve descripcion del seminario" aria-describedby="basic-icon-default-fullname2" disabled>{{ $seminario->descripcion }}
                              </textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Maximo de
                                    estudiantes</label>
                                <div class="input-group input-group-merge">

                                    <input type="number" class="form-control" name="max_personas"
                                        value="{{ $seminario->max_personas }}"
                                        aria-describedby="basic-icon-default-fullname2" disabled />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Costo</label>
                                <div class="input-group input-group-merge">
                                    <input type="number" class="form-control" name="costo"
                                        value="{{ $seminario->costo }}" aria-describedby="basic-icon-default-fullname2"
                                        disabled />
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="basic-icon-default-email">Duración del
                                            curso</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                            <input type="number" name="duracion" value="{{ $seminario->duracion }}"
                                                class="form-control" aria-describedby="basic-icon-default-email2"
                                                disabled />
                                        </div>
                                        <div class="form-text">Solo puedes introducir numeros en este campo</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="basic-icon-default-email">unidad</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                            <select class="form-select " name="unidad_duracion" id=""
                                                disabled>
                                                <option
                                                    value="Días"@php
if($seminario->unidad_duracion=="Diás")
                                            echo "Selected"; @endphp>
                                                    Diás</option>
                                                <option
                                                    value="Meses"@php
if($seminario->unidad_duracion=="Meses")
                                        echo "Selected"; @endphp>
                                                    Meses</option>
                                                <option value="Años"
                                                    @php
if($seminario->unidad_duracion=="Años")
                                        echo "Selected"; @endphp>
                                                    Años</option>
                                                <option
                                                    value="Horas"@php
if($seminario->unidad_duracion=="Horas")
                                        echo "Selected"; @endphp>
                                                    Horas</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-1">
                                        <label for="" class="form-label">Cod. Docente</label>
                                        <input type="text" class="form-control" name="id_docente" id=""
                                            placeholder="#" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label">Nombre Docente</label>
                                        <input type="text" class="form-control" name="name" id=""
                                            placeholder="seleccione un docente" disabled>
                                    </div>
                                </div>

                            </div>




                            <button type="submit" class="btn btn-primary">Modificar</button>
                            <a type="button"
                                href="{{ route('registerCurso.show', ['folder' => 'seminarios', 'content' => 'seminariosTable', 'tipo' => $seminario->tipo_curso]) }}"
                                class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="" style="max-with: 500px; padding-left: 10px;padding-right: 10px">
                    <div class="card mb-4">
                        <div class="row text-center" style="padding-top: 15px; padding-bottom: 15px">
                            <div>
                                <img id="docente_preview" src="{{ URL::asset('assets/img/userImage.png') }}"
                                    width="150px" height="150px" style="border-radius: 50%">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid gap-2">
                                <button type="button" name="" id="doc_asig"
                                    class="btn btn-primary d-none">Asignar
                                    Docente</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <table id="SemDocTable" class="table table-striped display" style="width:100%">
                    <thead>
                        <tr>
                            <th style="display: none"></th>
                            <th>Cod. Id</th>
                            <th>Docente</th>
                            <th>Grado Académico</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (session('docentes') as $docente)
                            <tr>
                                <td style="display:none">
                                    {{ $docente->img }}
                                </td>
                                <td>{{ $docente->id }}</td>
                                <td>{{ $docente->names . ' ' . $docente->lastnames }}</td>
                                <td>{{ $docente->degree_lv }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var table = $('#SemDocTable').DataTable({
            dom: '<"top"f>rt<"bottom"p><"clear">',

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
        $('#SemDocTable tbody').on('click', 'tr', function() {
            if ($(this).hasClass('table-primary')) {
                $(this).removeClass('table-primary');
                $('#doc_asig').addClass('d-none');
                $("#docente_preview").attr("src", "{{ URL::asset('assets/img/userImage.png') }}")

            } else {
                table.$('tr.table-primary').removeClass('table-primary');
                $(this).addClass('table-primary');
                var rowData = table.row(this).data();
                $("#docente_preview").attr("src", "{{ URL::asset('storage/imgDocentes/') }}\/" +
                    rowData[0])
                $("#doc_asig").removeClass('d-none')
                // console.log(rowData[0]);
            }
        });
    });
</script>
