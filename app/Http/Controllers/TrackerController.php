<?php

namespace App\Http\Controllers;

use App\Tracker;
use App\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackerController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware(['auth']);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $drivers = Delivery::with('driver')->where('status', 'On Progress')->get();

    return view('pages.tracking.index')->with(
      compact([
        'drivers'
      ])
    );
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Tracker  $tracker
   * @return \Illuminate\Http\Response
   */
  public function show(Tracker $tracker)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Tracker  $tracker
   * @return \Illuminate\Http\Response
   */
  public function edit(Tracker $tracker)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Tracker  $tracker
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Tracker $tracker)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Tracker  $tracker
   * @return \Illuminate\Http\Response
   */
  public function destroy(Tracker $tracker)
  {
      //
  }

  public function searchDriver($id) {
    $data = Tracker::where("user_id", $id)->orderBy("created_at", "DESC")->first();
    
    return response()->json([
      'data' => $data,
      'status' => 200
    ]);
  }

  public function search() {
    $data = DB::select(
      DB::raw("
        SELECT * 
        FROM trackers 
        WHERE created_at 
        IN (SELECT MAX(created_at) FROM trackers GROUP BY user_id)
      ")
    );
    
    return response()->json([
      'data' => $data,
      'status' => 200
    ]);
  }

  public function history() {
    $trackers = Tracker::with("driver")->orderBy("created_at", "DESC")->get();

    return view('pages.history.index')->with(
      compact([
        'trackers'
      ])
    );
  }
}
