<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index(int $serieID)
    {
//        Buscando todas as temporadas de uma serie
        $serie = Serie::find($serieID);
        $temporadas = $serie->temporadas;

        return view('temporadas.index', compact('serie', 'temporadas'));
    }
}
