<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\AdicionarSeries;
use App\Services\RemoverSerie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request) {
//      Ordernando pelo nome query->orderBY->get
        $series = Serie::query()
            ->orderBy('nome')
            ->get();

//        Recuperando dados da sessão
        $mensagem = $request->session()->get('mensagem');

        // compact manda variveis em PHP para a View
        return view('series.index', compact('series', 'mensagem'));
    }

//    Retorna a view par adicionar uma serie
    public function create()
    {
        return view('series.create');
    }

//    Faz o processo de inserir no banco a resposta do formulario
//    SeriesFormRequest -> Validações que criamos
    public function store(SeriesFormRequest $request, AdicionarSeries $adicionarSeries)
    {
        // Adicionando uma Serie. Usando Services
        $serie = $adicionarSeries->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );

//        Salvando na sessão alguma informação.
        $request->session()->flash(
            'mensagem',
            "Série {$serie->nome} e suas temporadas e episodios criados com sucesso"
        );

//        Redirecionando
        return redirect()->route('listar_series');
    }

    public function destroy(Request $request, RemoverSerie $removerSerie)
    {
        $nomeSerie = $removerSerie->removerSerie($request->id);
        $request->session()->flash(
            'mensagem',
            "Série $nomeSerie foi removida com sucesso !"
        );
        return redirect()->route('listar_series');
    }

    public function editaNomeSerie(int $id, Request $request)
    {
        $novoNomeSerie = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNomeSerie;
        $serie->save();
    }
}
