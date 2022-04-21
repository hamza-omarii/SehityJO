<?php

use App\Models\Clinic;
use Illuminate\Database\Seeder;

class ClinicSeeder extends Seeder
{
    public function run()
    {
        factory(Clinic::class, 2500)->create();
    }
}
