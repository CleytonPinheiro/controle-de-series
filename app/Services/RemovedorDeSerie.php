<?php


    namespace App\Services;

    use Illuminate\Support\Facades\DB;
    use App\{Serie, Temporada, Episodio};

    class RemovedorDeSerie
    {
        public function removerSerie(int $serieId): string
        {
            $nomeSerie= '';
            DB::transaction(function () use ($serieId, &$nomeSerie) {
                $serie= Serie::find ($serieId);
                $nomeSerie = $serie->nome;

                $this->removerTemporadas($serie);
                $serie->delete();
            });

            return $nomeSerie;
        }
    /**
     * @param $serie
     */
        public function removerTemporadas(Serie $serie): void
        {
            $serie->temporadas->each(function (Temporada $temporada) {


                $this->removerEpisodios($temporada);
                $temporada->delete();

            });


        }
        /**
         * @param Temporada $temporada
         */
        public function removerEpisodios(Temporada $temporada): void
        {
            $temporada->episodios()->each(function (Episodio $episodio) {
                $episodio->delete();
            });

        }

}
