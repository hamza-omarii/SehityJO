<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;


class Specialization extends Model
{

    use HasTranslations;

    public $translatable = ['name'];
    public $timestamps = false;
    protected $table = "specializations";

    /*
    ================
    ==  Relation  ==
    ================
    */

    public function doctors()
    {
        return $this->hasMany(Doctor::class, "specialist_id", "id");
    }

    public function hospitals()
    {
        return $this->belongsToMany(
            Hospital::class,
            "hospitals_specializations",
            "specialist_id",
            "hospital_id",
            "id",
            "id",
        );
    }
}
