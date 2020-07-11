<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de Series</title>

    <!--    BootStrap 4-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

{{--    Font Awsome--}}
    <script src="https://kit.fontawesome.com/3e4ce87fa3.js" crossorigin="anonymous"></script>

{{--    SweetAlert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

{{--    Jquery --}}
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex justify-content-between">
            <a class="navbar-brand" href="{{ route('listar_series') }}">
                <img src="https://logodownload.org/wp-content/uploads/2014/10/netflix-logo-5.png" alt="Home" width="10%">
            </a>

            {{--    @auth verificar se esta logado. Se não estiver, exclui a barra --}}
            @auth
                <a href="/sair" class="btn btn-outline-danger btn-sm">Sair</a>

            @endauth

            @guest
                <a href="/registrar" class="btn btn-outline-primary btn-sm justify-content-end">Registrar-me</a>
            @endguest
        </nav>

    <div class="container mt-5">
        <div class="jumbotron">
            <h1> @yield('cabecalho') </h1>
        </div>

        @yield('conteudo')
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
