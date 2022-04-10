<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Hospital;
use App\Models\Specialization;
use Illuminate\Http\Request;

class HospitalController extends Controller
{

    public function index()
    {
        $hospitals = Hospital::all();
        $specializations = Specialization::all();

        return view("admin.hospitals.index", compact("hospitals", "specializations"));
    }

    public function create()
    {
        $specializations = Specialization::all();
        $cites = City::all();
        return view("admin.hospitals.create", compact("specializations", "cites"));
    }


    public function store(Request $request)
    {
        $request->validate([
            "name_en"      => "required|max:125",
            "name_ar"      => "required|max:125",
            "city_id" => "required|exists:cities,id",
            "spec"    => "required",
        ]);

        $hospital = new Hospital();
        $hospital->name = ['en' => $request->input('name_en'), 'ar' => $request->input('name_ar')];
        $hospital->city_id = $request->input("city_id");
        $hospital->save();
        $hospital->specializations()->attach($request->input("spec"));

        return redirect()->route("admin.hospitals.index")->with("successKey", __("flashMessage.Created Hospital Successfuly"));
    }

    public function edit($id)
    {
        $hospital = Hospital::findOrFail($id);
        $specializations = Specialization::all();
        $spec_tags = $hospital->specializations()->pluck("specializations.id")->toArray();
        $cites = City::all();
        return view("admin.hospitals.edit", compact("hospital", "specializations", "cites", "spec_tags"));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            "name_en"      => "required|max:125",
            "name_ar"      => "required|max:125",
            "city_id" => "required|exists:cities,id",
            "spec"    => "required",
        ]);

        $hospital = Hospital::findOrFail($id);
        $hospital->name = ['en' => $request->input('name_en'), 'ar' => $request->input('name_ar')];
        $hospital->city_id = $request->input("city_id");
        $hospital->save();
        $hospital->specializations()->sync($request->input("spec"));

        return redirect()->route("admin.hospitals.index")->with("successKey", __("flashMessage.Updated Hospital Successfuly"));
    }

    public function destroy($id)
    {
        Hospital::destroy($id);
        return redirect()->route("admin.hospitals.index")->with("failureKey", __("flashMessage.Deleted Hospital Successfuly"));
    }
}
