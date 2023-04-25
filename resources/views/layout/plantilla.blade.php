<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <title>@yield('tituloPagina')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">

            <a class="navbar-brand " href="#">
                <img src="{{ URL::asset('assets/img/LogoPrincipal1.png') }} " alt="" width="150"
                    height="50" class="d-inline-block align-text-top">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item main-nav">
                        <a class="nav-link active" aria-current="page" href="{{ route('main.page') }}">Inicio</a>
                    </li>
                    <li class="nav-item main-nav dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cursos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Talleres</a></li>
                            <li><a class="dropdown-item" href="#">Capacitaciones</a></li>
                            <li><a class="dropdown-item" href="#">Seminarios</a></li>
                        </ul>
                    </li>
                    <li class="nav-item main-nav">
                        <a class="nav-link" href="#">Acerca de Nosotros</a>
                    </li>
                    <li class="nav-item main-nav">
                        <a class="nav-link" href="#">Vacantes</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                @if (auth()->check())
                    <form action="{{ route('session.destroy') }}" method="get">
                        <div class="dropdown open">
                            <button class="btn  dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->names . ' ' . auth()->user()->lastnames }}

                            </button>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <button class="dropdown-item" href="#">Action</button>
                                <hr>
                                <button class="dropdown-item">Cerrar
                                    Sesion</button>
                            </div>
                        </div>
                    </form>
                @else
                    <a class="btn
                                btn-secundario me-2"
                        href="{{ route('registerUser.form') }}" type="button">Registrarse</a>
                    <div class="dropdown">
                        <button class="btn btn-primario " type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Iniciar Sesion
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <form action="{{ route('login.auth') }}" method="post">
                                @csrf
                                <li>
                                    <div class="mb-3">
                                        <label for="mailLogin" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="mailLogin"
                                            placeholder="ejemplo123@mail.com">

                                    </div>
                                </li>
                                <li>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id=""
                                            placeholder="">
                                    </div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="text-center"><button type="submit" class="btn btn-primary">Enviar</button>
                                </li>
                            </form>
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </nav>
    @yield('contenido')



</body>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">
                <h4>Compañia</h4>
                <ul>
                    <li><a href="#">Acerca de Nosotros</a></li>
                    <li><a href="#">Nuestros Servicios</a></li>
                    <li><a href="#">Programa de reclutamiento</a></li>

                </ul>
            </div>
            <div class="footer-col">
                <h4>Recive ayuda</h4>
                <ul>
                    <li><a href="#">Contactanos</a></li>

                </ul>
            </div>
            <div class="footer-col">
                <h4>Cursos</h4>
                <ul>
                    <li><a href="#">Seminarios</a></li>
                    <li><a href="#">Talleres</a></li>
                    <li><a href="#">Capacitaciones</a></li>

                </ul>
            </div>
            <div class="footer-col">
                <h4>follow us</h4>
                <div class="social-links">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="text-center" style="color:white">
            &copy; 2023 FundeticBolivia.com
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>


</html>
