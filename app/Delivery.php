<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
  protected $fillable = ["driver_id" ,"car_id" ,"sj_number" ,"delivery_location" ,"curr_km" ,"last_km" ,"status"];

  public function driver() {
    return $this->hasOne('App\Driver', 'id', 'driver_id');
  }

  public function car() {
    return $this->hasOne('App\Car', 'id', 'car_id');
  }
}
