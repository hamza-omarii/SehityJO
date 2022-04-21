<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Admin;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\NewDoctorRegistered;
use Illuminate\Support\Facades\Notification;

class DoctorController extends Controller
{
    function ShowLoginForm()
    {
        $url = 'doctor';
        return view('auth.login', compact("url"));
    }

    function ShowRegisterForm()
    {
        $hospitals = Hospital::all(['id', 'name']);
        $specializations = Specialization::all(['id', 'name']);

        return view("auth.doctor_register", compact("hospitals", "specializations"));
    }


    function create(Request $request)
    {

        $request->validate([
            // Doctor Form
            'name'                  => 'required|max:50',
            'email'                 => 'required|email|unique:doctors,email',
            'password'              => 'required|min:5|max:30',
            'password_confirmation' => 'required|min:5|max:30|same:password',
            "date_birth"            => 'required|date',
            'gender'                => 'required|in:female,male',
            'hospital_id'           => 'required|exists:hospitals,id',
            'specialist_id'         => 'required|exists:specializations,id',
            'image'                 => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            // Clinic Form
            'floor'                 => 'required|int',
            'clinic_number'         => 'required|int',
            'phone_number'          => 'required|size:10|unique:clinics,phone_number',
            'fees'                  => 'required',
            'waiting_time'          => 'required',
            'address'               => 'required|string',
        ]);


        DB::beginTransaction();

        try {

            $img_path = null;
            if ($request->hasFile("image")) {
                $image_obj = $request->file("image");

                if ($image_obj->isValid()) {
                    $img_path = $image_obj->store("doc_profile_pic", "customDisk");
                }
            }



            $doctor = new Doctor();
            $doctor->name          = $request->input("name");
            $doctor->email         = $request->input("email");
            $doctor->password      = Hash::make($request->input("password"));
            $doctor->date_birth    = $request->input("date_birth");
            $doctor->hospital_id   = $request->input("hospital_id");
            $doctor->specialist_id = $request->input("specialist_id");
            $doctor->gender        = $request->input("gender");
            $doctor->description   = $request->input("description");
            $doctor->image         = $img_path;
            $saveDoctor = $doctor->save();


            $clinck = new Clinic();
            $clinck->hospital_id    = $request->input("hospital_id");
            $clinck->doctor_id      = $doctor->id;
            $clinck->floor          = $request->input("floor");
            $clinck->clinic_number  = $request->input("clinic_number");
            $clinck->phone_number   = $request->input("phone_number");
            $clinck->fees           = $request->input("fees");
            $clinck->waiting_time   = $request->input("waiting_time");
            $clinck->address        = $request->input("address");
            $saveClinck = $clinck->save();


            if ($saveDoctor && $saveClinck) {
                DB::commit();
                $admins = Admin::all();
                Notification::send($admins, new NewDoctorRegistered($doctor));
                return redirect()->route('doctor.login')->with('success', 'You are now registered successfully Login Now');
            } else {
                return redirect()->route('auth.doctor_register')->with('fail', 'Something went wrong, failed to register try again');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['fail' => $e->getMessage()]);
        }
    }

    function check(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'email' => 'required|email|exists:doctors,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists on our records'
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('doctor')->attempt($creds)) {
            return redirect()->route('doctor.dashboard');
        } else {
            return redirect()->route('doctor.login')->with('fail', 'The Email or Password is incorrect, Try again');
        }
    }

    public function getSpecificSpecialization($id)
    {
        $specialization_hospitals = Hospital::with("specializations")->findOrFail($id);
        return $specialization_hospitals->specializations;
    }

    public function editProfile($id)
    {
        $doctor = Doctor::with("clinic")->findOrFail($id);
        $hospitals = Hospital::all(['id', 'name']);
        $specializations = Specialization::all(['id', 'name']);

        return view("doctor.profile.edit", compact("doctor", "hospitals", "specializations"));
    }

    public function updateProfile($id)
    {
    }

    function logout()
    {
        Auth::guard('doctor')->logout();
        return redirect()->route('doctor.login');
    }
}
