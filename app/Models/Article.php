<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";

    /*
    ================
    ==  Relation  ==
    ================
    */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, "doctor_id", "id");
    }

    /*
    ================
    ==  Accessors ==
    ================
    */
    public function getImageUrlAttribute()
    {
        return ($this->image) ? asset("images/" . $this->image) : asset("images/articles/default-article.png");
    }
}
