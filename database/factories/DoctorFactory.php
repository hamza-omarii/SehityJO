<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Specialization;
use Faker\Generator as Faker;
use App\Models\Doctor;
use App\Models\Hospital;

$factory->define(Doctor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'hospital_id'   => Hospital::all()->random()->id,
        'specialist_id' => Specialization::all()->random()->id,
        'date_birth' => $faker->date,
        'is_active' => rand(0, 1),
        'description' => $faker->sentence(15),
        'gender'      => $faker->randomElement(['male', 'female']),
    ];
});
