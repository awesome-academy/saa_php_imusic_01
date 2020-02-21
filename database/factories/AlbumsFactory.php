<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Album;
use Faker\Generator as Faker;

$factory->define(Album::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'count' => $faker->numberBetween('100', '1000'),
        'image' => 'album.png',
    ];
});
