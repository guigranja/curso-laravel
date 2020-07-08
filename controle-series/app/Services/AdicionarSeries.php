<?php


namespace App\Services;

use App\Serie;
use Illuminate\Support\Facades\DB;

class AdicionarSeries
{
    public function criarSerie(string $nomeSerie, int $qtdTemporadas, int $epPorTemporada): Serie
     {
        /*
        * Usamos beginTransaction() para garantir que todos os registro são excluidos.
        * Caso não seja, o banco cancela a exclusão.
        * ao final executamos commit()
        * */
        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeSerie]);
        $this->criaTemporadas($qtdTemporadas, $epPorTemporada, $serie);
        DB::commit();

        return $serie;
    }

    private function criaTemporadas(int $qtdTemporadas, int $epPorTemporada, Serie $serie)
    {
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criaEpisodios($epPorTemporada, $temporada);
        }
    }

    private function criaEpisodios(int $epPorTemporada, \Illuminate\Database\Eloquent\Model $temporada)
    {
        for ($j = 1; $j <= $epPorTemporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}
