@extends('layout')

@section('cabecalho')
    Temporadas de {{ $serie->nome }}
@endsection

@section('conteudo')
    <ul class="list-group">
        @foreach($temporadas as $temporada)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><strong>Temporada:</strong> <i>{{ $temporada->numero }}</i></span>

                <span class="d-flex align-items-center">
                    <span class="badge badge-secondary mr-3">
                        {{ $temporada->episodios->count() }}
                    </span>

                    <a href="/temporadas/{{ $temporada->id }}/episodios" class="btn btn-outline-primary btn-sm mr-2">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                </span>
            </li>
        @endforeach
    </ul>
    <a href="/series" class="btn btn-outline-info mt-2">Voltar para Séries</a>
@endsection
