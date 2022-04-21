<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewAppointment;

class BookingController extends Controller
{

    public function getAppoinmentsForUser()
    {
        $appointments_of_today = Booking::all()->where("booking_date", date("Y-m-d"))->where("user_id", Auth::guard("web")->user()->id);
        $appointments = User::with("bookings")->findOrFail(Auth::guard('web')->user()->id)->bookings;
        return view("user.medical_record.medical_record", compact("appointments", "appointments_of_today"));
    }

    public function showMedicalReport($id)
    {
        $medical_report = Booking::findOrFail($id)->medicalReport;
        return view("user.medical_record.show_medcialReport", compact("medical_report"));
    }

    public function showDoctorDetails($id)
    {

        $doctor = Doctor::findOrFail($id);
        $hours_avialable = $doctor->times_avilable;

        $ratings_count = Rating::where("doctor_id", $id)->count();
        $ratings_value = 0; // defualut value if doctor dose not have rating
        $user_rating = Rating::where("user_id", Auth::guard("web")->user()->id)->where("doctor_id", $id)->first();

        if ($ratings_count > 0) {
            $ratings_value = number_format(Rating::where("doctor_id", $id)->sum("stars_rated") / $ratings_count);
        }

        return view("user.show_doctor_details", compact("doctor", "hours_avialable", "ratings_count", "ratings_value", "user_rating"));
    }

    public function UpdateAppointment(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($request->input("doctor_id"));
        $appointment = Booking::findOrFail($id);

        $request->validate([
            "booking_time" => [
                'required',
                Rule::unique('bookings')->where(function ($query) use ($request, $doctor) {
                    return $query
                        ->where('doctor_id', $doctor->id)
                        ->where('booking_date', $request->input("booking_date"));
                })->ignore($appointment->id)
            ],
            "booking_date" => "required",
        ]);

        $appointment->booking_date  = $request->input("booking_date");
        $appointment->booking_time  = $request->input("booking_time");
        $appointment->save();

        return redirect()->route("user.get.appointments")->with("successKey", __("flashMessage.Appointment Time Has Been Modified Successfully"));
    }

    public function MakeAppointment(Request $request)
    {
        $doctor = Doctor::findOrFail($request->input("doctor_id"));

        $request->validate([
            "booking_time" => [
                'required',
                Rule::unique('bookings')->where(function ($query) use ($request, $doctor) {
                    return $query
                        ->where('doctor_id', $doctor->id)
                        ->where('booking_date', $request->input("booking_date"));
                })
            ],
            "booking_date" => "required",
        ]);

        $appointment = new Booking();
        $appointment->user_id       = $request->input("user_id");
        $appointment->doctor_id     = $doctor->id;
        $appointment->hospital_id   = $doctor->hospital->id;
        $appointment->booking_date  = $request->input("booking_date");
        $appointment->booking_time  = $request->input("booking_time");
        $appointment->save();

        $doctor->notify(new NewAppointment($appointment));

        return redirect()->back()->with("successKey", __("Appointment booked successfully"));
    }

    public function deleteAppointment($id)
    {
        DB::table('notifications')->where('type', 'App\Notifications\NewAppointment')->where('data->id', $id)->delete();
        Booking::destroy($id);
        return redirect()->back()->with("failureKey", __("flashMessage.Appointment Deleted Successfully"));
    }
}
