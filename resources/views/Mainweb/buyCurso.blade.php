@extends('layout/plantilla')

@section('tituloPagina', 'Fundetic Website')

@section('contenido')
    <div class="cointainer" style="height: 600px">
        <div class="mt-3 d-flex ">

            @if (session('status') == 'error')
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        {{ session('mensage') }}
                    </div>

                </div>
            @endif
            @if (session('status') == 'success')
                <div class="alert alert-success  d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        {{ session('mensage') }}
                    </div>

                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-6" style="margin-top: 60px">
                <div class="text-center my-4">
                    <h1>Ultimos Pasos</h1>
                </div>
                <div class="text-center my-4">
                    <h3>Metodos de Pago</h3>
                </div>
                <div class="payment-methods">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item collapse-input">
                            <h3 class="accordion-header" id="headingOne">
                                <input id="radio-1" class="acordion-input" type="radio" data-bs-toggle="collapse"
                                    name='tipo-pago' data-bs-target="#collapseOne" aria-expanded="false"
                                    aria-controls="collapseOne">
                                <label for="radio-1"> <i class="fa-brands fa-paypal"></i> Paypal</label>


                            </h3>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Para mayor seguridad sobre su transaccion sera redirigido a los servidores seguro de
                                    PayPal.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item collapse-input">
                            <h3 class="accordion-header" id="headingTwo">
                                <input id="radio-2" class=" acordion-input" type="radio" data-bs-toggle="collapse"
                                    name='tipo-pago' data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                <label for="radio-2"> <i class="fa-solid fa-qrcode"></i> Transferencia Qr</label>

                            </h3>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Para mayor seguridad sobre su transaccion sera redirigido a los servidores seguro de
                                    PayPal.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="cart-primario">
                    <h2 class="card-title-primario">Resumen de Pago</h2>
                    <div class="row" style="margin-top: 70px">
                        <div class="col-md-8">
                            {{ $curso->titulo }}
                        </div>
                        <div class="col-md-4 text-end">
                            Bs. {{ $curso->costo }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>
                                Total:
                            </strong>
                        </div>
                        <div class="col-md-6  text-end">
                            <strong>
                                Bs. {{ $curso->costo }}
                            </strong>
                        </div>
                    </div>
                    <div class="row " style="margin-top:60px ">
                        <button id="btn-buy" class="btn fs-4 fw-bolder" style="background-color: #ffc107">Comprar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        document.getElementById('btn-buy').addEventListener('click', function() {
            if (document.getElementById('radio-1').checked) {
                window.location.href = "{{ route('buyCurso.paypal', ['id' => $curso->id_ch]) }}";
            } else if (document.getElementById('radio-2').checked) {
                console.log("2");
            }
        })
    </script>

@endsection
