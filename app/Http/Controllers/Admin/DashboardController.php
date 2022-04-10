<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\User;

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
