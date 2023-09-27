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
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Talleres/</span> Habilitar</h4>
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
        $taller = session('curso');
    @endphp

    <!-- Basic Layout -->
    <form id='enable_curso'
        action="{{ route('registerCurso.enable', ['folder' => 'talleres', 'content' => 'talleresEnableTable', 'tipo' => 'taller']) }}"
        method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">




                <div class="" style="max-with: 500px; padding-left: 10px;padding-right: 10px">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Nuevo curso</h5>
                            <small class="text-muted float-end">Taller</small>
                        </div>
                        <div class="card-body">

                            <input type="hidden" name="id_curso" value="{{ $taller->id }}">
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Titulo del Taller</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" name="titulo"
                                        value="{{ $taller->titulo }}" placeholder="Taller de Informatica I"
                                        aria-label="Taller de Informatica I"
                                        aria-describedby="basic-icon-default-fullname2" readonly />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Descripcion del
                                    taller</label>
                                <div class="input-group input-group-merge">

                                    <textarea class="form-control" name="descripcion" placeholder="Breve descripcion del taller"
                                        aria-label="Breve descripcion del taller" aria-describedby="basic-icon-default-fullname2" readonly>{{ $taller->descripcion }}
                              </textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Maximo de
                                    estudiantes</label>
                                <div class="input-group input-group-merge">

                                    <input type="number" class="form-control" name="max_personas"
                                        value="{{ $taller->max_personas }}"
                                        aria-describedby="basic-icon-default-fullname2" readonly />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Costo</label>
                                <div class="input-group input-group-merge">
                                    <input type="number" class="form-control" name="costo"
                                        value="{{ $taller->costo }}" aria-describedby="basic-icon-default-fullname2"
                                        readonly />
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">

                                    <label class="form-label" for="basic-icon-default-email">Duración del
                                        curso</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                        <input type="text" name="duracion"
                                            value="{{ $taller->duracion . ' ' . $taller->unidad_duracion }}"
                                            class="form-control" aria-describedby="basic-icon-default-email2"
                                            readonly />
                                    </div>
                                    <div class="form-text">Solo puedes introducir números en este campo</div>


                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="basic-icon-default-email">Fecha de Inicio del
                                            Curso</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                            <input type="datetime-local" id="fecha_habilitacion"
                                                name="fecha_habilitacion" value="" class="form-control"
                                                aria-describedby="basic-icon-default-email2" />
                                        </div>
                                        <div class="form-text">Seleccione una fecha de inicio</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="basic-icon-default-email">Fecha de culminacion
                                            del Curso</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                            <input type="datetime-local" id="fecha_culminacion"
                                                name="fecha_culminacion" value="" class="form-control"
                                                aria-describedby="basic-icon-default-email2" readonly />
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Cod. Docente</label>
                                        <input type="text" class="form-control" name="id_docente" id="id_docente"
                                            placeholder="#" readonly required>
                                    </div>
                                    <div class="col-md-9">
                                        <label for="" class="form-label">Nombre Docente</label>
                                        <input type="text" class="form-control " name="name" id="name_docente"
                                            placeholder="seleccione un docente" readonly required>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-7"><label class="form-label" for="basic-icon-default-phone">Subir
                                        Fotografia del Curso</label>
                                    <div class="input-group input-group-merge">
                                        <input type="file" name="img" class="form-control" id='img_curso'
                                            accept=".png, .jpeg, .jpg" />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row text-center">
                                        <div>
                                            <img id="show_curso_img"
                                                src="{{ URL::asset('assets/img/imagen_vacia.jpg') }}" width="180px"
                                                height="100px" style="border-radius: 10px">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Habilitar Curso</button>
                            <a type="button"
                                href="{{ route('registerCurso.show', ['folder' => 'talleres', 'content' => 'talleresTable', 'tipo' => $taller->tipo_curso]) }}"
                                class="btn btn-secondary">Cancelar</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="" style="max-with: 500px; padding-left: 10px;padding-right: 10px">
                        <div class="card mb-4">
                            <div class="row" style="padding-top: 15px; padding-bottom: 15px">
                                <div class="col-md-5 text-center">
                                    <img id="docente_preview" src="{{ URL::asset('assets/img/userImage.png') }}"
                                        width="150px" height="150px" style="border-radius: 50%">
                                </div>
                                <div class="col-md-7 mt-3">
                                    <p>
                                        <strong>COD. Docente:</strong> <span id='info_docID'></span>
                                    </p>
                                    <p>
                                        <strong>Nombre Docente:</strong> <span id='info_docName'></span>
                                    </p>
                                    <p>
                                        <strong>Nivel Academico:</strong> <span id='info_docDlv'></span>
                                    </p>
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
                    <h3>
                        Seleccione al un docente de la tabla
                    </h3>
                </div>
                <div class="row">
                    <table id="TallerDocTable" class="table table-striped display" style="width:100%">
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
                <hr>
                <div class="row card p-2">
                    <h3>Que dias será el curso?</h3>
                    <p>Considere tambien el horario de cada dia, este horario se dará a conocer a los alumnos!</p>
                    <div class="inpurCheck-group">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input calendar-check" type="checkbox" id="check-lunes"
                                        name="check-calendar[]" data-day="lunes" value="lunes">
                                    <label class="form-check-label fs-4" for="check-lunes">Lunes</label>

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="time" id="hora-lunes" name="hora-lunes"
                                        disabled>
                                    <label for="hora-lunes">Hora de finalización</label>
                                </div>



                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="time" id="fin-lunes" name="fin-lunes"
                                        disabled>
                                    <label for="fin-lunes">Hora de finalización</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input calendar-check" type="checkbox" id="check-martes"
                                        name="check-calendar[]" data-day="martes" value="martes">
                                    <label class="form-check-label fs-4" for="check-martes">Martes</label>

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="time" id="hora-martes" name="hora-martes"
                                        disabled>

                                    <label for="hora-martes">Hora de finalización</label>
                                </div>


                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="time" id="fin-martes" name="fin-martes"
                                        disabled>
                                    <label for="fin-martes">Hora de finalización</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input calendar-check" type="checkbox"
                                        id="check-miercoles" name="check-calendar[]" data-day="miercoles"
                                        value="miercoles">
                                    <label class="form-check-label fs-4" for="check-miercoles">Miercoles</label>

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="time" id="hora-miercoles"
                                        name="hora-miercoles" disabled>
                                    <label for="hora-miercoles">Hora de finalización</label>
                                </div>



                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="time" id="fin-miercoles"
                                        name="fin-miercoles" disabled>
                                    <label for="fin-miercoles">Hora de finalización</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input calendar-check" type="checkbox" id="check-jueves"
                                        name="check-calendar[]" data-day="jueves" value="jueves">
                                    <label class="form-check-label fs-4" for="check-jueves">Jueves</label>

                                </div>

                            </div>
                            <div class="col-md-4">

                                <div class="form-floating mb-3">
                                    <input class="form-control" type="time" id="hora-jueves" name="hora-jueves"
                                        disabled>
                                    <label for="hora-jueves">Hora de finalización</label>
                                </div>


                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="time" id="fin-jueves" name="fin-jueves"
                                        disabled>
                                    <label for="fin-jueves">Hora de finalización</label>
                                </div>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input calendar-check" type="checkbox" id="check-viernes"
                                        name="check-calendar[]" data-day="viernes" value="viernes">
                                    <label class="form-check-label fs-4" for="check-viernes">Viernes</label>

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="time" id="hora-viernes" name="hora-viernes"
                                        disabled>
                                    <label for="hora-viernes">Hora de finalización</label>
                                </div>



                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="time" id="fin-viernes" name="fin-viernes"
                                        disabled>
                                    <label for="fin-viernes">Hora de finalización</label>
                                </div>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input calendar-check" type="checkbox" id="check-sabado"
                                        name="check-calendar[]" data-day="sabado" value="sabado">
                                    <label class="form-check-label fs-4" for="check-sabado">Sabado</label>

                                </div>

                            </div>
                            <div class="col-md-4">

                                <div class="form-floating mb-3">
                                    <input class="form-control" type="time" id="hora-sabado" name="hora-sabado"
                                        disabled>
                                    <label for="hora-sabado">Hora de finalización</label>
                                </div>


                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="time" id="fin-sabado" name="fin-sabado"
                                        disabled>
                                    <label for="fin-sabado">Hora de finalización</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input calendar-check" type="checkbox" id="check-domingo"
                                        name="check-calendar[]" data-day="domingo" value="domingo">
                                    <label class="form-check-label fs-4" for="check-domingo">Domingo</label>

                                </div>

                            </div>
                            <div class="col-md-4">

                                <div class="form-floating mb-3">
                                    <input class="form-control" type="time" id="hora-domingo" name="hora-domingo"
                                        disabled>
                                    <label for="hora-domingo">Hora de Inicio</label>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="time" id="fin-domingo" name="fin-domingo"
                                        disabled>
                                    <label for="fin-domingo">Hora de finalización</label>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="check-mismo-horario">
                                <label class="form-check-label" for="defaultCheck1">
                                    Marcar todos con el mismo horario
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="time" name="" id="mismo-horario"
                                    disabled>
                                <label for="mismo-horario">Hora de incio</label>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="time" name="" id="mismo-finhorario"
                                    disabled>
                                <label for="mismo-finhorario">Hora de Finalización</label>
                            </div>

                        </div>
                    </div>




                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $("#img_curso").on("change", function() {
        var file = document.getElementById('img_curso').files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            $("#show_curso_img").attr("src", e.target.result);
        }
        reader.readAsDataURL(file);
    })
    $(document).ready(function() {
        var table = $('#TallerDocTable').DataTable({
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
        $('#TallerDocTable tbody').on('click', 'tr', function() {
            if ($(this).hasClass('table-primary')) {
                $(this).removeClass('table-primary');
                $('#doc_asig').addClass('d-none');
                $("#docente_preview").attr("src", "{{ URL::asset('assets/img/userImage.png') }}")
                $('#info_docID').html('')
                $('#info_docName').html('')
                $('#info_docDlv').html('')
            } else {
                table.$('tr.table-primary').removeClass('table-primary');
                $(this).addClass('table-primary');
                var rowData = table.row(this).data();
                $("#docente_preview").attr("src", "{{ URL::asset('storage/imgDocentes/') }}\/" +
                    rowData[0])
                $('#info_docID').html(rowData[1])
                $('#info_docName').html(rowData[2])
                $('#info_docDlv').html(rowData[3])
                $("#doc_asig").removeClass('d-none')
                // console.log(rowData[0]);
            }
        });
        $("#doc_asig").on('click', () => {
            $('#id_docente').val($('#info_docID').text())
            $('#name_docente').val($('#info_docName').text())
        })
        $('#enable_curso').on('submit', function(e) {

            if ($('#id_docente').val() === "") {
                e.preventDefault();
                alert('Porfavor Seleccione a un docente de la tabla')
                return false;
            }

        })
        $('#fecha_habilitacion').on('change', function() {
            fec = $(this).val();

            var fechaOriginal = new Date(Date.parse(fec));
            console.log("Fecha antigua: " + fechaOriginal);
            switch ('{{ $taller->unidad_duracion }}') {
                case 'Días':
                    var fechaNueva = new Date(fechaOriginal.setDate(fechaOriginal.getDate() +
                        {{ $taller->duracion }}));
                    break;
                case 'Meses':
                    var fechaNueva = new Date(fechaOriginal.setMonth(fechaOriginal.getMonth() +
                        {{ $taller->duracion }}));
                    break;
                case 'Años':

                    var fechaNueva = new Date(fechaOriginal.setFullYear(fechaOriginal.getFullYear() +
                        {{ $taller->duracion }}));
                    break;
                case 'Horas':
                    var fechaNueva = new Date(fechaOriginal.setHours(fechaOriginal.getHours() +
                        {{ $taller->duracion }}));
                    break;

            }
            console.log("Fecha Nueva: " + fechaNueva);
            let dia = fechaNueva.getDate().toString().padStart(2, '0');
            let mes = (fechaNueva.getMonth() + 1).toString().padStart(2, '0');
            let anio = fechaNueva.getFullYear().toString();
            let hora = fechaNueva.getHours().toString().padStart(2, '0');
            let minutos = fechaNueva.getMinutes().toString().padStart(2, '0');
            let fechaHoraLocal = `${anio}-${mes}-${dia}T${hora}:${minutos}`;
            console.log(fechaHoraLocal);

            $('#fecha_culminacion').val(fechaHoraLocal);
        })

    });
</script>
