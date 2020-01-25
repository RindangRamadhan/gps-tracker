<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $cars = Car::orderBy('id', 'DESC')->get();

    return view('pages.cars.index')->with(
      compact([
        'cars'
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
    return view('pages.cars.create');
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
      'name' => 'required|unique:cars,name',
      'plate_number' => 'required',
    ]);

    $car = Car::create([
      'name' => $request->name,
      'plate_number' => $request->plate_number,
      'curr_km' => 0,
      'last_km' => 0,
    ]);

    return redirect('/cars')->with(['status' => 200]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Car  $car
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Car  $car
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $car = Car::find($id);
        
    return view('pages.cars.edit')->with(compact([
      'car',
    ]));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Car  $car
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $car = Car::find($id);

    $this->validate($request, [
      'name' => 'required|unique:cars,name,'. $id,
      'plate_number' => 'required',
    ]);

    $car->update([
      'name' => $request->name,
      'plate_number' => $request->plate_number,
    ]);

    return redirect('/cars')->with(['status' => 200]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Car  $car
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $car = Car::find($id);

    if($car->is_used == 1) {
      return response()->json([
        'status' => 500
      ]);
    } else {
      $car->delete();

      return response()->json([
        'status' => 200
      ]);
    }
  }
}
