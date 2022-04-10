<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Hospital;
use Faker\Generator as Faker;



$factory->define(Clinic::class, function (Faker $faker) {

    $rand_hospital_id = Hospital::all()->pluck("id");
    static $number = 1;
    return [
        'hospital_id' => $faker->randomElement($rand_hospital_id),
        'floor' => $faker->randomDigit,
        'clinic_number' => $faker->randomDigit,
        'phone_number'  => $faker->numerify("##########"),
        'waiting_time'  => $faker->randomNumber(2),
        'address'       => $faker->address,
        'fees'          => $faker->randomNumber(2),
        'doctor_id'     => $number++,
    ];
});
