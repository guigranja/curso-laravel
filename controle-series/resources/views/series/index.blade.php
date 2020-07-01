@extends('layout')

{{--Cabeçalho--}}
@section('cabecalho')
Séries
@endsection

@section('conteudo')
{{--Conteudo--}}
<a href="/series/adicionar" class="btn btn-outline-dark mb-2">Adicionar</a>

<ul class="list-group">
{{--    @ é usado pelo blade, para chamar tags PHP --}}
    @foreach($series as $serie)
        <li class="list-group-item">
            <?= $serie ?>
        </li>
    @endforeach
</ul>
@endsection
