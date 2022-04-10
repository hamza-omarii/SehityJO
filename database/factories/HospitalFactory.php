<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\City;
use App\Models\Hospital;
use Faker\Generator as Faker;

$factory->define(Hospital::class, function (Faker $faker) {
    return [
        "name" => [
            "en" => $faker->company,
            "ar" => $faker->company,
        ],
        "city_id" => City::all()->random()->id,
    ];
});
