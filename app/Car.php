<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ["name", "plate_number", "curr_km", "last_km"];
}
