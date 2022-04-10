<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = ["name"];
    protected $table = "cities";
    public $timestamps = false;
}
