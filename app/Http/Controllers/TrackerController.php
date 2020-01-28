<?php

namespace App\Http\Controllers;

use App\Tracker;
use Illuminate\Http\Request;

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
    return view('pages.tracking.index');
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
}
