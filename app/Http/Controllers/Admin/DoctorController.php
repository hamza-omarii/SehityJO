<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input("type") == "active") {
            $doctors = Doctor::latest()->where("is_active", 1)->paginate();
        } else if ($request->input("type") == "notActive") {
            $doctors = Doctor::latest()->where("is_active", 0)->paginate();
        } else {
            $doctors = Doctor::latest()->paginate();
        }

        return view("admin.doctors.index", compact("doctors"));
    }

    public function destroy($id)
    {
        DB::table('notifications')->where('type', 'App\Notifications\NewDoctorRegistered')->where('data->id', $id)->delete();
        Doctor::destroy($id);
        return redirect()->route("admin.doctors")->with("failureKey", __("flashMessage.Doctor has been removed successfully"));
    }


    function showDoctorDetails(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        if ($request->has("mark")) {
            $notification_id = $request->input("id_of_notify");
            $Notification = Auth::guard("admin")->user()->notifications->find($request->input("id_of_notify"));
            if ($Notification) {
                $Notification->markAsRead();
            }
        }

        return view("admin.doctors.show_details", compact("doctor"));
    }

    function approveDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->is_active = 1;
        $doctor->save();

        return redirect()->route("admin.doctors")->with("successKey", __("flashMessage.Doctor has been Activated Successfully"));
    }
}
