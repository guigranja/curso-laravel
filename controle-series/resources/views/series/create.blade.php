@extends('layout')

{{--cabeçalho--}}
@section('cabecalho')
Adicionar Serie
@endsection

{{--Conteudo--}}
@section('conteudo')

{{--    Tratando uma validação --}}
    @include('error', ['errors' => $errors])

    <form method="post">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="nome" class="label">Nome</label>
                <input type="text" class="form-control mb-2" name="nome">
            </div>

            <div class="col col-2">
                <label for="qtd_temporadas">Nº de temporadas</label>
                <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
            </div>

            <div class="col col-2">
                <label for="ep_por_temporada">Ep. por temporada</label>
                <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada">
            </div>
        </div>

        <button class="btn btn-outline-primary">Adicionar</button>
        <a href="/series" class="btn btn-outline-secondary">Voltar</a>
    </form>
@endsection
