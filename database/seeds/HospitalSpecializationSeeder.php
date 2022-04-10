<?php

use Faker\Factory;
use App\Models\Hospital;
use App\Models\Specialization;
use Illuminate\Database\Seeder;

class HospitalSpecializationSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $this->create();
        }
    }
    public function create()
    {
        $faker = Factory::create();
        return DB::table('hospitals_specializations')->insert([
            "hospital_id" => $faker->randomElement(Hospital::all()->pluck("id")),
            "specialist_id" => $faker->randomElement(Specialization::all()->pluck("id")),
        ]);
    }
}
