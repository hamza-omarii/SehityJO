<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Doctor extends Authenticatable
{
    use Notifiable;

    protected $table = "doctors";
    protected $fillable = ['name', 'email', 'password', 'date_birth', 'hospital_id', 'specialist_id'];

    protected $hidden = ['password', 'remember_token'];

    ## The attributes that should be cast to native types. ##
    protected $casts = ['email_verified_at' => 'datetime'];

    /*
    ================
    ==  Relation  ==
    ================
    */
    public function clinck()
    {
        return $this->hasOne(Clinic::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, "specialist_id", "id");
    }

    /*
    ================
    ==  Accessors ==
    ================
    */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset("images/" . $this->image);
        } else {
            return ($this->gender === "male") ? asset("images/doc_profile_pic/defaultMale.png") : asset("images/doc_profile_pic/defaultFemale.png");
        }
    }


    public function getIsActiveDeafultAttribute()
    {
        return ($this->is_active === 0) ? __("dashboard.Not_Active") : __("dashboard.Active");
    }
}
