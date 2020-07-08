<?php
namespace App\Services;

use App\Episodio;
use App\Serie;
use App\Temporada;

use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Void_;

class RemoverSerie
{
    public function removerSerie(int $serieID): string
    {
        /*
         * Usamos transaction para garantir que todos os registro são excluidos.
         * Caso não seja, o banco cancela a exclusão
         * */
        DB::beginTransaction();
        $serie = Serie::find($serieID);
        $nomeSerie = $serie->nome;

        /*
         * Tratando o problema de exclusão de chaves estrangeiras.
         * Exclui em cascada
         * */
        $this->removerTemporadas($serie);
        $serie->delete();
        DB::commit();

        return $nomeSerie;
    }

    /**
     * @param $serie
     */
    private function removerTemporadas($serie)
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerEpisodios($temporada);
            $temporada->delete();
        });
    }

    /**
     * @param Temporada $temporada
     * @throws \Exception
     */
    private function removerEpisodios(Temporada $temporada)
    {
        $temporada->episodios->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
}
