<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasTranslations;

    protected $table = "hospitals";
    public $translatable = ['name'];


    /*
    ================
    ==  Relation  ==
    ================
    */

    public function specializations()
    {
        return $this->belongsToMany(
            Specialization::class,
            "hospitals_specializations",
            "hospital_id",
            "specialist_id",
            "id",
            "id",
        );
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class, "city_id", "id");
    }
}
