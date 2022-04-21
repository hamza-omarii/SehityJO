<?php

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    public function run()
    {
        factory(Doctor::class, 2500)->create();
    }
}
