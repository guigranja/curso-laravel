@extends('layout')

@section('cabecalho')
    Registrar-se
@endsection

@section('conteudo')
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nome Completo</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-outline-primary mt-3 cadastrar" id="cadastrar">
            Me Cadastrar
        </button>
    </form>

{{--    SCRIPT --}}
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            onOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer)
                toast.addEventListener("mouseleave", Swal.resumeTimer)
            }
        });

        let cadastrar = document.getElementById("cadastrar");

        cadastrar.addEventListener("click", naoPreenchido, false);

        function naoPreenchido(e) {

            let nome = document.getElementById("name").value;
            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;

            if (nome == '') {
                e.preventDefault();
                e.stopPropagation();

                Toast.fire({
                    icon: 'error',
                    title: 'O campo Nome Completo é óbrigatorio !'
                });
                return;
            }

            if (email == '') {
                e.preventDefault();
                e.stopPropagation();

                Toast.fire({
                    icon: 'error',
                    title: 'O campo E-mail é óbrigatorio !'
                });
                return;
            }

            if (password == '') {
                e.preventDefault();
                e.stopPropagation();

                Toast.fire({
                    icon: 'error',
                    title: 'O campo Senha é óbrigatorio !'
                });
            }
        }
    </script>
@endsection
