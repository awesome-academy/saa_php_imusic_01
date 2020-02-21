<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Song;
use Faker\Generator as Faker;

$factory->define(Song::class, function (Faker $faker) {
    return [
        'link' => 'Blue Browne.mp3',
        'title' => $faker->unique()->streetName,
        'image' => 'song.png',
        'count' => $faker->numberBetween('1000', '10000'),
        'is_new' => $faker->boolean($chanceOfGettingTrue = 30),
        'category_id' => $faker->numberBetween(1, 10)
    ];
});
