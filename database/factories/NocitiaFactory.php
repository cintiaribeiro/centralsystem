<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Noticia;
use Faker\Generator as Faker;

$factory->define(Noticia::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'titulo' => $faker->title,
        'noticia' => $faker->text
    ];
});
