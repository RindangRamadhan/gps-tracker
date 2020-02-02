<?php

namespace App\Http\Controllers\Api\v1;

use App\Tracker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrackerController extends Controller
{
  public function store(Request $request) {    
    Tracker::create([
      'user_id' => $request->user_id,
      'location' => json_encode($request->location),
    ]);
  }
}
