<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = "bookings";

    /*
    ================
    ==  Relation  ==
    ================
    */
    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, "doctor_id", "id");
    }

    public function medicalReport()
    {
        return $this->hasOne(MedicalReport::class, "booking_id", "id");
    }
}
