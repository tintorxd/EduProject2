

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <title>Web Administrativa</title>
    <style>
        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .loginform {
            position: fixed;
            top: 25%;
            left: 42%;
            width: 400px!important;

        }

        @media (max-width: 768px) {
            .loginform {
                top: 25%;
                left: 30%;
            }
        }

        @media (max-width: 425px) {
            .loginform {
                top: 25%;
                left: 6%;
            }
        }
    </style>
</head>
<body
    style="background: url('{{ URL::asset('assets/img/fondoLogin.png') }}') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover; text-center;">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

    <main class="form-signin">

        <div class="cart-secundario loginform" style="min-height: 350px;">
            <div class="row">
                <h3>Inicio de Sesion</h3>
            </div>
            @if(session()->get('error'))
               <div class="alert alert-danger" role="alert">
                 <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
               <strong>!Datos Invalidos</strong> porfavor intente nuevamente
            </div>  
            @endif
                 
            <form action="{{ route('loginAdmin.auth') }}" method="post">
                @csrf
                <div class="form-floating mb-3 mt-4">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                        name="email">
                    <label for="floatingInput">Correo Electronico</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                        name='password'>
                    <label for="floatingPassword">Constraseña</label>
                </div>
                <hr>
                <div class="row text-center" style="margin-top: 20px;">

                    <button type="submit" class="btn btn-primary">Iniciar Sesion</button>

                </div>
            </form>

        </div>

    </main>

</body>
   </html> 
