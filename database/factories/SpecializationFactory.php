<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Specialization;

$factory->define(Specialization::class, function (Faker $faker) {
    return [
        "name" => [
            "en" => $faker->name,
            "ar" => $faker->name,
        ],
    ];
});
