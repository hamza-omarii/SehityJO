<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Models\MedicalReport;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Facades\Storage;

class MedicalReportController extends Controller
{
    public function create($id)
    {
        $appointment_id = $id;
        return view("doctor.medical_reports.create", compact("appointment_id"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|max:200",
            "content" => "required",
            "content" => "required",
            "attachment" => "nullable",
        ]);

        $image_path = null;

        if ($request->hasFile("attachment")) {
            $image_obj = $request->file("attachment");

            if ($image_obj->isValid()) {
                $image_path = $image_obj->store("medical_reports", "customDisk");
            }
        }

        $medical_report = new MedicalReport();
        $medical_report->booking_id = $request->input("booking_id");
        $medical_report->title = $request->input("title");
        $medical_report->content = $request->input("content");
        $medical_report->attachments = $image_path;
        $medical_report->save();

        $appointment = Booking::findOrFail($medical_report->appointment->id);
        $appointment->status = "done";
        $appointment->save();

        return redirect()->route("doctor.show.appointment", $medical_report->appointment->id)->with("successKey", __("flashMessage.Medical Report Added Successfully"));
    }

    public function edit($id)
    {
        $medical_report = MedicalReport::findOrFail($id);
        return view("doctor.medical_reports.edit", compact("medical_report"));
    }

    public function update(Request $request, $id)
    {
        $medical_report = MedicalReport::findOrFail($id);

        $request->validate([
            "title" => "required|max:200",
            "content" => "required",
            "content" => "required",
            "attachment" => "nullable",
        ]);

        $image_path = $medical_report->attachments;
        if ($request->hasFile("attachment")) {
            Storage::disk("customDisk")->delete($medical_report->attachments);
            $image_obj = $request->file("attachment");

            if ($image_obj->isValid()) {
                $image_path = $image_obj->store("medical_reports", "customDisk");
            }
        }

        $medical_report->title = $request->input("title");
        $medical_report->content = $request->input("content");
        $medical_report->attachments = $image_path;
        $medical_report->save();

        return redirect()->route("doctor.show.appointment", $medical_report->appointment->id)->with("successKey", __("flashMessage.Medical Report Updated Successfully"));
    }

    public function destroy($id)
    {
        $medical_report = MedicalReport::findOrFail($id);
        if ($medical_report->attachments) {
            Storage::disk("customDisk")->delete($medical_report->attachments);
        }
        $medical_report->delete();
        return redirect()->route("doctor.show.appointment", $medical_report->appointment->id)->with("failureKey", __("flashMessage.Medical Report Destroy Successfully"));
    }
}
