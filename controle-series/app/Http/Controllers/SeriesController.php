<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request) {
//                                    Ordernando pelo nome query->orderBY->get
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
    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create($request->all());

//        Salvando na sessão alguma informação.
        $request->session()->flash(
            'mensagem',
            "Série {$serie->id} criada com sucesso: {$serie->nome}"
        );

//        Redirecionando
        return redirect()->route('listar_series');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);

        $request->session()->flash(
            'mensagem',
            "Série foi removida com sucesso !"
        );

        return redirect()->route('listar_series');
    }
}
