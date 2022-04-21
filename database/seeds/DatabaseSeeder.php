<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            CitiesSeeder::class,
            HospitalSeeder::class,
            SpecializationSeeder::class,
            DoctorSeeder::class,
            ClinicSeeder::class,
            UserSeeder::class,
            SuggestionSeeder::class,
            HospitalSpecializationSeeder::class,
            ArticleSeeder::class,
        ]);
    }
}
