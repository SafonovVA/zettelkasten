<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Note;
use Faker\Generator as Faker;

$factory->define(Note::class, function (Faker $faker) {
    $dateTime = $faker->dateTimeBetween('-1 month');

    return [
        'title' => $faker->unique()->sentence(rand(3, 8), true),
        'content' => $faker->unique()->realText(rand(10, 1000)),
        'parent_id' => null,
        'user_id' => rand(1, 3),
        'created_at' => $dateTime,
        'updated_at' => $dateTime
    ];
});
