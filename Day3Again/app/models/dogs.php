<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class dogs extends Model
{

    protected $fillable = ["race", "color"];

    public function dog_adds()
    {
        return $this->belongsTo('App\Models\adds');
    }
}
