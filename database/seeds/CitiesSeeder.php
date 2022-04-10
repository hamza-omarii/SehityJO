<?php

use Illuminate\Support\Facades\DB;
use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    public function run()
    {
        $cities = [
            [
                "en" => "Zarqa",
                "ar" => "الزرقاء",
            ],
            [
                "en" => "Amman",
                "ar" => "عمان",
            ],
            [
                "en" => "Irbid",
                "ar" => "اربد",
            ],
            [
                "en" => "Mafraq",
                "ar" => "المفرق",
            ],
            [
                "en" => "Karak",
                "ar" => "الكرك",
            ],
            [
                "en" => "Tafila",
                "ar" => "الطفيلة",
            ],
            [
                "en" => "Ma'an",
                "ar" => "معان",
            ],
            [
                "en" => "Madaba",
                "ar" => "مادبا",
            ],
            [
                "en" => "Aqaba",
                "ar" => "العقبة",
            ],
            [
                "en" => "Balqa",
                "ar" => "البلقاء",
            ],
            [
                "en" => "Jerash",
                "ar" => "جرش",
            ],
            [
                "en" => "Ajloun",
                "ar" => "عجلون",
            ],
        ];

        foreach ($cities as $city) {
            City::create(['name' => $city]);
        }
    }
}
