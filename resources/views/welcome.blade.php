@extends('layout/plantilla')

@section('tituloPagina', 'Fundetic Website')

@section('contenido')



    <div class="contenedor-primario text-center">
        <img src="{{ URL::asset('assets/img/LogoPrincipal2.png') }}"
            style="max-width: 100%; max-height: 900px; margin: 50px 0 20px " alt="...">
    </div>
    <div class="contenedor-secundario">
        <div class="container">
            <div class="row text-center">
                <h1>Acerca de Nosotros</h1>
            </div>
            <div class="row">
                <div class="col-md-6 ">
                    <div class="row sticky-top-image shadow p-3 bg-body rounded" style="background-color: #fffffe ">
                        <div style="max-width: 17rem; max-height: auto;">
                            <img src="{{ URL::asset('assets/img/ALZA.png') }}"
                                style="max-width: 17rem; max-height: 300px; margin: 0px 0 5px " alt="...">
                            <div
                                style="max-width: 270px; text-align: justify; padding-left: 40px; text-decoration: underline;">
                                Lorem ipsum, dolor sit amet
                            </div>
                        </div>

                        <div style="max-width: 17rem; max-height: auto; ">
                            <img src="{{ URL::asset('assets/img/JCILogo.png') }}"
                                style="max-width: 17rem; max-height: 100px; margin: 50px 20px 20px " alt="...">
                            <div style="max-width: 270px; text-align: justify;">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi velit rem vel magni!
                                Nesciunt quod fugiat distinctio commodi optio natus necessitatibus</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">

                    <div class="cart-secundario">
                        <h2 class="card-title-secundario">Mision</h2>

                        <p class="text-start card-text-secundario">Some quick example text to build on the card title and
                            make
                            up the bulk of the card's content. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Accusantium esse optio reprehenderit quidem, cupiditate beatae architecto ratione quos eum,
                            voluptate velit officiis, ex provident totam iure sapiente fugit. Quisquam, nobis. Lorem ipsum
                            dolor sit</p>
                    </div>
                    <div class="cart-secundario">
                        <h2 class="card-title-secundario">Vision</h2>

                        <p class="card-text-secundario">Some quick example text to build on the card title and make up the
                            bulk of the card's content. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium
                            esse optio reprehenderit quidem, cupiditate beatae architecto ratione quos eum, voluptate velit
                            officiis, ex provident totam iure sapiente fugit. Quisquam, nobis. Lorem ipsum dolor sit</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contenedor-primario text-center">

        <h1>Proximante!....</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="cart-primario" style="max-width: 600px">
                        <h1 class="card-title-primario">Agenda Digital!</h1>
                        <div class="text-start ">
                            <div class="card-title-primario "
                                style="padding-top: 30px; font-size: 50px; font-family: monospace; text-decoration: underline;">
                                ¿Qué es?</div>
                            <div class="card-title-primario"
                                style="margin-top: 10px; font-size: 50px; font-family: monospace; text-decoration: underline;">
                                ¿Para que sirve?
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cart-secundario">
                        <div class="row">
                            <img src="{{ URL::asset('assets/img/img2.png') }}" style="width: 180px; height: 150px"
                                alt="" class="rounded-circle">
                        </div>
                        <div style="overflow-x: hidden; overflow-y:auto; max-height: 200px;">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum earum eius ea exercitationem
                            delectus nostrum inventore excepturi soluta? Voluptatum quibusdam, fuga velit blanditiis quaerat
                            repudiandae dolor incidunt facilis quo soluta.
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="contenedor-secundario">
        <div class="container" style=" display: flex; justify-content: center;">


            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="max-width: 80%">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ URL::asset('assets/img/informatica-2.jpg') }}" class="d-block" width="1000px"
                            height="500px" alt="...">
                        <div class="carousel-caption d-none d-md-block bg-whiteT">
                            <h5>Cusos De Sistemas Informaticos</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                            <a name="" id="" class="btn btn-primario" style="opacity: 60%;" href="#"
                                role="button">
                                Más información</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ URL::asset('assets/img/ramasInformaticas.jpg') }}" class="d-block" width="1000px"
                            height="500px" alt="...">
                        <div class="carousel-caption d-none d-md-block bg-whiteT">
                            <h5>Seminarios de Auditoria de Sistemas</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                            <a name="" id="" class="btn btn-primario" style="opacity: 60%;" href="#"
                                role="button">
                                Más información</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ URL::asset('assets/img/aprender-informatica-online.jpg') }}" class="d-block"
                            width="1000px" height="500px" alt="...">
                        <div class="carousel-caption d-none d-md-block bg-whiteT">
                            <h5>Talleres de Seguridad Informatica</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                            <a name="" id="" class="btn btn-primario" style="opacity: 60%;"
                                href="#" role="button">
                                Más información</a>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>

    </div>



@endsection
