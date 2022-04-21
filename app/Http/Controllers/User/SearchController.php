<?php

namespace App\Http\Controllers\User;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Hospital;
use App\Models\Specialization;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $doctors = Doctor::select("id", "name", "image", "hospital_id", "specialist_id")->paginate(15);
        $cites = City::all();
        $resultWord = __("main.All Doctors");

        if ($request->has("city_id") && $request->has("hospital_id") && $request->has("specialist_id")) {
            $resultWord = __("main.Search Results");
            $doctors = Doctor::select("id", "name", "image", "hospital_id", "specialist_id")
                ->whereHas('hospital', function ($query) use ($request) {
                    $query->where('city_id', $request->input("city_id"));
                })
                ->where("hospital_id", $request->input("hospital_id"))
                ->where("specialist_id", $request->input("specialist_id"))
                ->paginate(15);
        }

        return view("user.search", compact("doctors", "cites", "resultWord"));
    }

    public function get_Hospitals_When_Cities($id)
    {
        $hospitalsMatch = City::with("hospitals")->findOrFail($id);
        return  $hospitalsMatch->hospitals;
    }

    public function get_Specialization_When_Hospital($id)
    {
        $specialization_hospitals = Hospital::with("specializations")->findOrFail($id);
        return $specialization_hospitals->specializations;
    }
}
