<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Link;
use Faker\Generator as Faker;

$factory->define(Link::class, function (Faker $faker) {

    return [
        'title' => $faker->unique()->sentence(rand(3, 8), true),
        'note_id' => null,
        'url' => $faker->url,
    ];
});
