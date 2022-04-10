<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function index()
    {
        $specializations = Specialization::all();
        return view("admin.specializations.index", compact("specializations"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name_ar" => "required|string|max:255",
            "name_en" => "required|string|max:255",
        ]);

        $specs = new Specialization();
        $specs->name = ['en' => $request->input('name_en'), 'ar' => $request->input('name_ar')];
        $specs->save();

        return redirect()->route("admin.specialization.index")->with("successKey", __("flashMessage.Created Specialization Successfully"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name_ar" => "required|string|max:125",
            "name_en" => "required|string|max:125",
        ]);

        $specs = Specialization::findOrFail($id);
        $specs->name = ['en' => $request->input('name_en'), 'ar' => $request->input('name_ar')];
        $specs->save();

        return redirect()->route("admin.specialization.index")->with("successKey", __("flashMessage.Updated Specialization Successfully"));
    }

    public function destroy($id)
    {
        // check if there doctor related to this Specialization
        $doctors_count = Specialization::findOrFail($id)->doctors->count();

        // check if there hospitals related to this Specialization
        $hospital_count = Specialization::with('hospitals')->findOrFail($id)->hospitals->count();

        if ($doctors_count > 0  || $hospital_count > 0) {
            return redirect()->route("admin.specialization.index")->with("failureKey", __("flashMessage.Sorry, you cannot delete this specialty, there are doctors and hospitals associated with it"));
        }
        Specialization::destroy($id);
        return redirect()->route("admin.specialization.index")->with("failureKey", __("flashMessage.Deleted Specialization Successfully"));
    }
}
