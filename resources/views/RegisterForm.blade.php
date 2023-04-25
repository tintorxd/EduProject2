@extends('layout/plantilla')

@section('tituloPagina', 'Formulario de registro')

@section('contenido')
    <div class="container pt-3">
        <div class="row ">
            <div class="offset-md-1 col-md-6 border formulario">
                <form action="{{ route('registerUser.create') }}" method="post">
                    @csrf
                    <div class="row mb-3 position-relative">
                        <h2 class="col-md-6">Registro Usuario</h2>
                        <div class="col-md-6 ">
                            <div class="position-absolute bottom-0 end-0">
                                Ingresa tus datos con información valida
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id=""
                            placeholder="ejemplo123@mail.com">

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="" placeholder=""
                            minlength="8">
                        <small id="emailHelpId" class="form-text text-muted">Ingrese una contraseña que contenga almenos 8
                            caracteres</small>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nombres</label>
                        <input type="text" class="form-control" name="names" id="" aria-describedby="helpId"
                            placeholder="">

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="lastnames" id="" aria-describedby="helpId"
                            placeholder="">

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Telefono</label>
                        <input type="text" class="form-control" name="phone_number" id=""
                            aria-describedby="helpId" placeholder="">

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="birthdate" id="" aria-describedby="helpId"
                            placeholder="">

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Registrar usuario</button>
                        </div>
                        <div class="col-md-6 text-end">
                            <a name="" id="" class="btn btn-secondary" href="{{ route('main.page') }}"
                                role="button">Regresar al inicio</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
