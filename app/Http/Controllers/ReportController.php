<?php

namespace App\Http\Controllers;

use App\Delivery;
use Illuminate\Http\Request;

class ReportController extends Controller
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
    return view('pages.reports.index');
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
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
  
  public function search($periode) {
    $periode = explode(" - ", $periode);
    $start = $periode[0];
    $end = $periode[1];

    $reports = Delivery::with(['driver', 'car'])
      ->where('created_at', '>=', $start)
      ->where('created_at', '<=', $end)
      ->where('status', 'Done')
      ->orderBy('created_at', 'asc')
      ->get();
    
    return response()->json([
      'data' => $reports,
      'status' => 200
    ]);
  }
  
  public function print($periode) {
    $periode = explode(" - ", $periode);
    $start = $periode[0];
    $end = $periode[1];

    $reports = Delivery::with(['driver', 'car'])
      ->where('created_at', '>=', $start)
      ->where('created_at', '<=', $end)
      ->where('status', 'Done')
      ->orderBy('created_at', 'asc')
      ->get();
    
    return view('pages.reports.print')->with(
      compact([
        'start',
        'end',
        'reports'
      ])
    );
  }
}
