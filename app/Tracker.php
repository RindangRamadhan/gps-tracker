<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    protected $fillable = ["user_id", "location"];

    
    public function driver() {
        return $this->hasOne('App\Driver', 'user_id', 'user_id');
    }
}
