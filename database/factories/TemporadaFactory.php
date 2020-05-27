<?php

use Faker\Generator as Faker;

$factory->define(App\Temporada::class, function (Faker $faker) {
    return [
        'numero' => $faker->numberBetween(1, 10)
    ];
});

$factory->afterMaking(App\Temporada::class, function (App\Temporada $temporada) {
    $temporada->episodios->add(factory(App\Episodio::class)->make());
});