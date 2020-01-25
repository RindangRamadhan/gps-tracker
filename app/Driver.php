<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ["user_id", "name", "no_telp", "nik"];

	public function user() {
		return $this->hasOne('App\User', 'id', 'user_id');
	}
}
