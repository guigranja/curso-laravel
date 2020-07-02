@extends('layout')

{{--cabeçalho--}}
@section('cabecalho')
Adicionar Serie
@endsection

{{--Conteudo--}}
@section('conteudo')

{{--    Tratando uma validação --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post">
        <div class="form-group">
            @csrf
            <label for="nome" class="label">Nome</label>
            <input type="text" class="form-control mb-2" name="nome">
        </div>

        <button class="btn btn-outline-primary">Adicionar</button>
        <a href="/series" class="btn btn-outline-secondary">Voltar</a>
    </form>
@endsection
