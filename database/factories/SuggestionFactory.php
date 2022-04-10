<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Suggestion;
use Faker\Generator as Faker;

$factory->define(Suggestion::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'subject' => $faker->sentence(2),
        'message' => $faker->sentence(30),
    ];
});
