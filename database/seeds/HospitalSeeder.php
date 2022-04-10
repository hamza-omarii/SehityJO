<?php


use App\Models\Hospital;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    public function run()
    {
        factory(Hospital::class, 25)->create();
    }
}
