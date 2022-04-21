<?php


use App\Models\Hospital;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    public function run()
    {
        $hospitals = [
            [
                "name" => [
                    "en" => "Islamic Hospital",
                    "ar" =>  "المستشفى الإسلامي",
                ],
                "city_id" => 2,
            ],

            [
                "name" => [
                    "en" => "Dar es Salaam Hospital",
                    "ar" =>  "مستشفى دار السلام",
                ],
                "city_id" => 2,
            ],

            [
                "name" => [
                    "en" => "Al-Hussein Medical City",
                    "ar" =>  "مدينة الحسين الطبية",
                ],
                "city_id" => 2,
            ],

            [
                "name" => [
                    "en" => "Al Ahly Hospital",
                    "ar" =>  "المستشفى الأهلي",
                ],
                "city_id" => 2,
            ],

            [
                "name" => [
                    "en" => "Al Bayader Hospital",
                    "ar" =>  "مستشفى البيادر",
                ],
                "city_id" => 2,
            ],

            [
                "name" => [
                    "en" => "Al Khalidi Medical Center",
                    "ar" =>  "مركز الخالدي الطبي",
                ],
                "city_id" => 2,
            ],

            [
                "name" => [
                    "en" => "Al Aqsa Hospital",
                    "ar" =>  "مستشفى الأقصى",
                ],
                "city_id" => 2,
            ],

            [
                "name" => [
                    "en" => "Al Bashir Hospital",
                    "ar" =>  "مستشفى البشير",
                ],
                "city_id" => 2,
            ],

            [
                "name" => [
                    "en" => "Isra Hospital",
                    "ar" =>  "مستشفى الإسراء",
                ],
                "city_id" => 2,
            ],
            [
                "name" => [
                    "en" => "Gardens Hospital",
                    "ar" =>  "مستشفى الجاردنز",
                ],
                "city_id" => 2,
            ],
            [
                "name" => [
                    "en" => "Al Quds Hospital",
                    "ar" =>  "مستشفى القدس",
                ],
                "city_id" => 2,
            ],
            [
                "name" => [
                    "en" => "Jordan University Hospital",
                    "ar" =>  "مستشفى الجامعة الأردنية",
                ],
                "city_id" => 2,
            ],
            [
                "name" => [
                    "en" => "Modern Wisdom Hospital",
                    "ar" =>  "مستشفى الحكمة الحديث",
                ],
                "city_id" => 1,
            ],
            [
                "name" => [
                    "en" => "New Al Razi Hospital",
                    "ar" =>  "مستشفى الرازي الجديد",
                ],
                "city_id" => 1,
            ],
            [
                "name" => [
                    "en" => "Zarqa Governmental Hospital",
                    "ar" =>  "مستشفى الزرقاء الحكومي",
                ],
                "city_id" => 1,
            ],
            [
                "name" => [
                    "en" => "Jabal Alzyton Hospital",
                    "ar" =>  "مستشفى جبل الزيتون",
                ],
                "city_id" => 1,
            ],
            [
                "name" => [
                    "en" => "An-Najah Hospital",
                    "ar" =>  "مستشفى النجاح",
                ],
                "city_id" => 3,
            ],
            [
                "name" => [
                    "en" => "Yarmouk Hospital",
                    "ar" =>  "مستشفى اليرموك",
                ],
                "city_id" => 3,
            ],
            [
                "name" => [
                    "en" => "Ibn Al-Nafis Hospital",
                    "ar" =>  "مستشفى ابن النفيس",
                ],
                "city_id" => 3,
            ],
            [
                "name" => [
                    "en" => "Irbid Specialized Hospital",
                    "ar" =>  "مستشفى إربد التخصصي",
                ],
                "city_id" => 3,
            ],
            [
                "name" => [
                    "en" => "Irbid Islamic Hospital",
                    "ar" =>  "مستشفى إربد الإسلامي",
                ],
                "city_id" => 3,
            ],
        ];

        foreach ($hospitals as $hopital) {
            Hospital::create($hopital);
        }
        /* factory(Hospital::class, 25)->create(); */
    }
}
