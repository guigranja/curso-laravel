@extends('layout')

@section('cabecalho')
    Episodios
@endsection

@section('conteudo')

{{--    @include('mensagem', ['mensagem' => $mensagem])--}}

    <form action="/temporadas/{{ $temporadaId }}/episodios/assistir" method="post">
        @csrf
        <div class="d-flex justify-content-between align-items-center mb-3">
            <span><i>Marcar Todos: </i></span>

            <input type="checkbox" class="mr-4" id="marcarTodos">
        </div>
        <ul class="list-group">
            @foreach($episodios as $episodio)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong>Episodio:</strong> <i>{{ $episodio->numero }}</i></span>

                    <input type="checkbox" name="episodios[]" value="{{ $episodio->id }}" style="cursor: pointer" {{ $episodio->assistido ? 'checked' : '' }}>
                </li>
            @endforeach
        </ul>

        <button class="btn btn-outline-success mt-2" id="save" onclick="avisoMarcarEpisodioAssistido()">Salvar</button>
    </form>

    <script>
        function avisoMarcarEpisodioAssistido() {
            Swal.fire({
                icon: 'success',
                title: 'Episodio salvo como assistido !',
                showConfirmButton: false,
                timer: 7000
            })
        }

        $("#marcarTodos").change(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>

@endsection
