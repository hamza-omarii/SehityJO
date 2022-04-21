<?php

use App\Models\Specialization;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    public function run()
    {
        $specialization = [
            [
                "en" => "dentistry",
                "ar" => "طب اسنان",
            ],
            [
                "en" => "Obstetrics and Gynecology",
                "ar" => "نسائية وتوليد",
            ],
            [
                "en" => "General Surgery",
                "ar" => "جراحة عامة",
            ],
            [
                "en" => "bones",
                "ar" => "عظام",
            ],
            [
                "en" => "Babies and newborns",
                "ar" => "الأطفال وحديثي الولادة",
            ],
            [
                "en" => "ophthalmology",
                "ar" => "طب العيون",
            ],
            [
                "en" => "Skin and genitals",
                "ar" => "الجلد والأعضاء التناسلية",
            ],
            [
                "en" => "Heart and arteries",
                "ar" => "قلب وشرايين",
            ],
            [
                "en" => "Ear, Nose and Throat",
                "ar" => "أنف وأذن وحنجره",
            ],
            [
                "en" => "Nutrition and Diet",
                "ar" => "تغذية وحمية",
            ],
            [
                "en" => "Orthodontist",
                "ar" => "تقويم الأسنان",
            ],
            [
                "en" => "Orthopedic and Endoscopy",
                "ar" => "جراحة العظام والمناظير",
            ],
            [
                "en" => "Bariatric surgery",
                "ar" => "جراحة السمنة",
            ],
            [
                "en" => "Injection of microscopic",
                "ar" => "حقن مجهري وأطفال انابيب",
            ],
            [
                "en" => "gland diseases",
                "ar" => "أمراض الغدة",
            ],
            [
                "en" => "Brain surgery",
                "ar" => "جراحة الدماغ",
            ],
            [
                "en" => "Thoracic surgery",
                "ar" => "جراحة الصدر",
            ],
            [
                "en" => "Cancer and various tumors",
                "ar" => "السرطان والأورام المختلفة",
            ]
        ];

        foreach ($specialization as $spec) {
            Specialization::create(["name" => $spec]);
        }
    }
}
