<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalReport extends Model
{
    protected $table = "medical_reports";

    /*
    ================
    ==  Relation  ==
    ================
    */
    public function appointment()
    {
        return $this->belongsTo(Booking::class, "booking_id", "id");
    }
}
