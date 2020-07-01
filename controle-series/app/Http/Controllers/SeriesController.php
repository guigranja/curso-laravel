<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index() {
        $series = [
            'Greys Anatomy',
            'Lost',
            'Agents of SHIELD',
            'Pinky Blinders'
        ];

        // compact manda variveis em PHP para a View
        return view('series.index', compact('series'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $nome = $request->get('nome');
        $serie = new Serie();
        $serie->nome = $nome;
        var_dump($serie->save());
    }
}
