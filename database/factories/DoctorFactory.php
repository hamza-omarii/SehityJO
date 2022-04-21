<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Specialization;
use Faker\Generator as Faker;
use App\Models\Doctor;
use App\Models\Hospital;

$factory->define(Doctor::class, function (Faker $faker) {

    $arr_images = ["random1.jpg", "random2.jpg", "random3.jpg", "random4.jpg", "random5.jpg", "random6.jpg", "random7.jpg", "random8.png", "random9.png", "random10.png", "random11.png", "random12.png", "random13.png", "random14.png", "random15.png", "random16.jpg"];

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'hospital_id'   => $faker->randomElement([1, 2, 3]),
        'specialist_id' => Specialization::all()->random()->id,
        'date_birth' => $faker->date,
        'is_active' => rand(0, 1),
        'image'     => "doc_profile_pic/random_for_testing/" . $arr_images[rand(0, count($arr_images) - 1)],
        'description' => $faker->sentence(15),
        'gender'      => $faker->randomElement(['male', 'female']),
    ];
});
