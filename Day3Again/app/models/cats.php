<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class cats extends Model
{

    protected $fillable = ["race", "color"];

    public function cat_adds()
    {
        return $this->belongsTo('App\Models\adds');
    }
}
