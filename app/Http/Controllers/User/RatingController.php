<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Doctor;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function submit(Request $request)
    {
        $stars_rated = $request->input("product_rating");
        $doctor_id   = $request->input("doctor_id");

        $doctor_check = Doctor::where("id", $doctor_id)->first();

        if ($doctor_check) {
            $verified_appointment = Booking::where("user_id", Auth::guard("web")->user()->id)->where("doctor_id", $doctor_id)->where("status", "done")->count();

            if ($verified_appointment > 0) {
                $existing_rating = Rating::where("user_id", Auth::guard("web")->user()->id)->where("doctor_id", $doctor_id)->first();
                if ($existing_rating) {
                    $existing_rating->update([
                        "stars_rated" => $stars_rated
                    ]);
                } else {
                    Rating::create([
                        "user_id"   => Auth::guard("web")->user()->id,
                        "doctor_id" => $doctor_id,
                        "stars_rated" => $stars_rated,
                    ]);
                }
                return redirect()->back()->with("successKey", __("flashMessage.Thank you for Rated"));
            } else {
                return redirect()->back()->with("failureKey", __("flashMessage.You have not visited the doctor before so you cannot rating"));
            }
        } else {
            return redirect()->back()->with("failureKey", __("flashMessage.The Link you Followed Was Broken"));
        }
    }
}
