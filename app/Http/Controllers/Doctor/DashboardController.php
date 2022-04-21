<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $hours_avialable  = Doctor::findOrFail(Auth::guard("doctor")->user()->id)->times_avilable;

        $appointments_of_today = Booking::all()->where("booking_date", date("Y-m-d"));

        $done_counter    = Booking::all()->where("status", "done")->count();
        $pending_counter = Booking::all()->where("status", "pending")->count();
        $failed_counter  = Booking::all()->where("status", "failed")->count();

        return view("doctor.dashboard", compact("appointments_of_today", "hours_avialable", "done_counter", "pending_counter", "failed_counter"));
    }
}
