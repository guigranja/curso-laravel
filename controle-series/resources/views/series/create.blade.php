@extends('layout')

{{--cabeçalho--}}
@section('cabecalho')
Adicionar Serie
@endsection

{{--Conteudo--}}
@section('conteudo')
<form method="post">
    <div class="form-group">
        @csrf
        <label for="nome" class="label">Nome</label>
        <input type="text" class="form-control mb-2" name="nome">
    </div>

    <button class="btn btn-outline-primary">Adicionar</button>
</form>
@endsection
