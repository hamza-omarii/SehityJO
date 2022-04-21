<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'national_number'];

    protected $hidden = ['password', 'remember_token'];

    ## The attributes that should be cast to native types. ##
    protected $casts = ['email_verified_at' => 'datetime'];

    /*
    ================
    ==  Relation  ==
    ================
    */
    public function bookings()
    {
        return $this->hasMany(Booking::class, "user_id", "id");
    }
}
