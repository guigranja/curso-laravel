@extends('layout')

{{--Cabeçalho--}}
@section('cabecalho')
Séries
@endsection

@section('conteudo')
{{--Conteudo--}}

@include('mensagem', ['mensagem' => $mensagem])

<a href="{{ route('form_add_serie') }}" class="btn btn-outline-dark mb-2">Adicionar</a>

<ul class="list-group">
{{--    @ é usado pelo blade, para chamar tags PHP --}}
    @foreach($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

            <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                <input type="text" class="form-control" value="{{ $serie->nome }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" onclick="editarSerie({{ $serie->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>

            <span class="d-flex">
                <button class="btn btn-outline-info btn-sm mr-2" onclick="toggleInput({{ $serie->id }})">
                    <i class="fas fa-edit"></i>
                </button>
                <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-outline-primary btn-sm mr-2">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                <form method="post" action="/series/{{ $serie->id }}" onsubmit="return confirm('Tem certeza que deseja remover {{ $serie->nome }}?')">
                    @csrf
    {{--                Altera o metodo da requisição --}}
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
            </span>
        </li>
    @endforeach
</ul>

<script>
    function toggleInput(serieId) {
        const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
        const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);

        if (nomeSerieEl.hasAttribute('hidden')) {
            nomeSerieEl.removeAttribute('hidden')
            inputSerieEl.hidden = true;
        } else {
            inputSerieEl.removeAttribute('hidden');
            nomeSerieEl.hidden = true;
        }
    }

    function editarSerie(serieId) {
        const urlEdit = `/series/${serieId}/editaNomeSerie`;

        let formData = new FormData();

        // Vamos selecionar o elemento FILHO da DIV, que é o input
        const nome = document.querySelector(`#input-nome-serie-${serieId} > input`).value;

        const token = document.querySelector('input[name=_token]').value;
        formData.append('nome', nome);
        formData.append('_token', token);

        fetch(urlEdit, {
            body: formData,
            method: 'POST'
        }).then(() => {
            Swal.fire({
                icon: 'success',
                title: 'Perfeito !!!',
                text: 'Nome da serie atualizado com sucesso !!!'
            }).then((result) => {
                toggleInput(serieId);
                document.getElementById(`nome-serie-${serieId}`).textContent = nome;
            })
        });
    }
</script>

@endsection
