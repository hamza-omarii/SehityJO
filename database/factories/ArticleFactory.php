<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Doctor;
use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    $arr_images = ["a1.jpg", "a2.jpg", "a3.jpg", "a4.jpg", "a5.jpg", "a6.jpg", "a7.jpg", "a8.jpg", "a9.jpg", "a10.jpg", "a11.jpg", "a12.jpg", "a13.jpg", "a14.jpg", "a15.jpg"];

    return [
        "doctor_id" => $faker->randomElement(Doctor::all()->pluck("id")),
        "title"     => $faker->sentence(2),
        "description" => $faker->sentence(25),
        "image" => "articles/random_for_testing/" . $arr_images[rand(0, count($arr_images) - 1)],
    ];
});
