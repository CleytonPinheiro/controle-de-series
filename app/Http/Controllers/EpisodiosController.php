<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index (Temporada $temporada)
    {
       return view('episodios.index' , [
           'episodios'=>$temporada->episodios,
           'temporadaId'=>$temporada->id
    ]);
    }

    public function assistir (Temporada $temporada, Request $request)
    {
        $episodiosAssistidos=$request->episodios;
        $temporada->episodios->each(function (Episodio $episodio)
            use ($episodiosAssistidos){
            $episodio-> assistido = in_array(
                $episodio->id,
                $episodiosAssistidos
            );

    });
    $temporada->push();

    }
}
