<?php

namespace App\Listeners;

use App\Events\NovaSerie;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarEmailNovaSerieCadastrada
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NovaSerie  $event
     * @return void
     */
    public function handle(NovaSerie $event)
    {
        $nomeSerie = $event->nomeSerie;
        $qtdTemporadas = $event->qtdTemporadas;
        $qtdEpisodios = $event->qtdEpisodios;

        $users = User::all();
        foreach ($users as $i => $user){

            $multiplicador  = $i + 1;
            $email = new \App\Mail\NovaSerie(
                $nomeSerie,
                $qtdTemporadas,
                $qtdEpisodios
            );

            $email->subject ='Nova série adicionada';
            //Para não reconhecer o e-mail como spam
            $quando = now()->addSecond($multiplicador * 10);
            \Illuminate\Support\Facades\Mail::to($user)->later(
                $quando,
                $email);
            //sleep(5);
        }
    }
}
