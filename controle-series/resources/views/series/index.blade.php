@extends('layout')

{{--Cabeçalho--}}
@section('cabecalho')
Séries
@endsection

@section('conteudo')
{{--Conteudo--}}

@if(!empty($mensagem))
    <div class="alert alert-success">
        {{ $mensagem }}
    </div>
@endif

<a href="{{ route('form_add_serie') }}" class="btn btn-outline-dark mb-2">Adicionar</a>

<ul class="list-group">
{{--    @ é usado pelo blade, para chamar tags PHP --}}
    @foreach($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $serie->nome  }}

            <form method="post" action="/series/{{ $serie->id }}" onsubmit="return confirm('Tem certeza que deseja remover {{ $serie->nome }}?')">
                @csrf
{{--                Altera o metodo da requisição --}}
                @method('DELETE')
                <button class="btn btn-outline-danger btn-sm">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
