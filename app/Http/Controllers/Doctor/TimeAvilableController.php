<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TimeAvilableController extends Controller
{
    public function showTimesAvilable()
    {

        $doctor = Doctor::findOrFail(Auth::guard('doctor')->user()->id);
        $times_arr = $doctor->times_avilable;
        return view("doctor.times_avilable.showTimesAvilable", compact('times_arr'));
    }

    public function updateTimesAvilable(Request $request)
    {

        $doctor_id = Auth::guard('doctor')->user()->id;
        $doctor = Doctor::findOrFail($doctor_id);
        $doctor->times_avilable = $request->input("time");
        $doctor->save();

        return redirect()->back()->with("successKey", __("flashMessage.Times have been updated successfully"));
    }
}
