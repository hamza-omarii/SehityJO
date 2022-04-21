<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Doctor;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function getAppointments(Request $request)
    {
        $doctor_id = Auth::guard("doctor")->user()->id;

        $doctor = Doctor::with("bookings")->findOrFail($doctor_id);

        $appoinments = $doctor->load("bookings")->bookings;
        $hours_avialable = $doctor->times_avilable;

        if ($request->has("type")) {
            if ($request->input("type") == "done") {
                $appoinments = $doctor->load(["bookings" => function ($query) {
                    $query->where("status", "done");
                }])->bookings;
            } else if ($request->input("type") == "pending") {
                $appoinments = $doctor->load(["bookings" => function ($query) {
                    $query->where("status", "pending");
                }])->bookings;
            } else if ($request->input("type") == "failed") {
                $appoinments = $doctor->load(["bookings" =>  function ($query) {
                    $query->where("status", "failed");
                }])->bookings;
            }
        }

        return view("doctor.appoinments_booking.index", compact("appoinments", "hours_avialable"));
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail(Auth::guard("doctor")->user()->id);
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

        return redirect()->route("doctor.get.appointments")->with("successKey", __("flashMessage.Appointment Time Has Been Modified Successfully"));
    }

    public function showAppointment(Request $request, $id)
    {
        $doctor_id = Auth::guard("doctor")->user()->id;
        $doctor = Doctor::findOrFail($doctor_id);
        $hours_avialable = $doctor->times_avilable;
        $appointment = Booking::findOrFail($id);


        if ($request->has("mark")) {
            $notification_id = $request->input("id_of_notify");
            $Notification = Auth::guard("doctor")->user()->notifications->find($request->input("id_of_notify"));
            if ($Notification) {
                $Notification->markAsRead();
            }
        }

        return view("doctor.appoinments_booking.show", compact("appointment", "hours_avialable"));
    }

    public function changeState(Request $request, $id)
    {
        $request->validate([
            'state' => [
                'required',
                Rule::in(['done', 'pending', 'failed']),
            ],
        ]);

        $appointment = Booking::findOrFail($id);
        $appointment->status = $request->input("state");
        $appointment->save();

        return redirect()->route("doctor.get.appointments")->with("successKey", __("flashMessage.Appointment State Has Been Modified Successfully"));
    }

    public function destroy($id)
    {
        DB::table('notifications')->where('type', 'App\Notifications\NewAppointment')->where('data->id', $id)->delete();
        Booking::destroy($id);
        return redirect()->route("doctor.get.appointments")->with("failureKey", __("flashMessage.Appointment Deleted Successfully"));
    }
}
