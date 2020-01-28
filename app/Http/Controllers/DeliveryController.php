<?php

namespace App\Http\Controllers;

use App\Car;
use App\Driver;
use App\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
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
    $delivery = Delivery::with(['driver', 'car'])->orderBy('id', 'DESC')->get();

    return view('pages.delivery.index')->with(
      compact([
        'delivery'
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
    $drivers = Driver::orderBy('name', 'ASC')->get();
    $cars = Car::orderBy('name', 'ASC')->get();

    return view('pages.delivery.create')->with(
      compact([
        'drivers',
        'cars'
      ])
    );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'driver' => 'required',
      'car' => 'required',
      'location' => 'required',
    ]);

    $car = Car::find($request->car);
    $delivery = Delivery::create([
      'sj_number' => $request->sj_number,
      'driver_id' => $request->driver,
      'car_id' => $request->car,
      'delivery_location' => $request->location,
      'curr_km' => $car->curr_km,
      'last_km' => 0,
      'status' => "On Progress",
    ]);

    return redirect('/delivery')->with(['status' => 200]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Delivery  $delivery
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Delivery  $delivery
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $drivers = Driver::orderBy('name', 'ASC')->get();
    $cars = Car::orderBy('name', 'ASC')->get();
    $delivery = Delivery::find($id);
        
    return view('pages.delivery.edit')->with(compact([
      'drivers',
      'cars',
      'delivery',
    ]));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Delivery  $delivery
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $delivery = Delivery::find($id);
    
    $this->validate($request, [
      'driver' => 'required',
      'car' => 'required',
      'location' => 'required',
    ]);

    $delivery->update([
      'driver_id' => $request->driver,
      'car_id' => $request->car,
      'delivery_location' => $request->location,
    ]);

    return redirect('/delivery')->with(['status' => 200]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Delivery  $delivery
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $delivery = Delivery::find($id)->delete();

    return response()->json([
      'status' => 200
    ]);
  }

  public function updateStatus($id, Request $request)
  {    
    $delivery = Delivery::find($id);
    $car = Car::find($delivery->car_id);

    $delivery->update([
      'status' => 'Done',
      'last_km' => $request->last_km,
    ]);

    $car->update([
      'curr_km' => $request->last_km,
    ]);

    return response()->json([
      'status' => 200
    ]);
  }
}
