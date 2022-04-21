<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Hospital;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $patients_count = User::all()->count();
        $hospital_count = Hospital::all()->count();
        $doctors_count = Doctor::all()->count();
        $patients = User::latest()->get();
        return view("admin.dashboard", compact("patients_count", "hospital_count", "doctors_count", "patients"));
    }
}
