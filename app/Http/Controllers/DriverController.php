<?php

namespace App\Http\Controllers;

use App\Driver;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
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
    $drivers = Driver::with('user')->orderBy('id', 'DESC')->get();

    return view('pages.drivers.index')->with(
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
    return view('pages.drivers.create');
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
      'email' => 'required|unique:users,email',
      'name' => 'required|unique:drivers,name',
      'phone_number' => 'required',
      'nik' => 'required',
    ]);

    $user = User::create([
      'email' => $request->email,
      'name' => $request->name,
      'password' => Hash::make(123456),
      'role' => "Driver",
    ]);

    $driver = Driver::create([
      'user_id' => $user->id,
      'name' => $request->name,
      'no_telp' => $request->phone_number,
      'nik' => $request->nik,
    ]);

    return redirect('/drivers')->with(['status' => 200]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Driver  $driver
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Driver  $driver
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $driver = Driver::with('user')->find($id);
        
    return view('pages.drivers.edit')->with(compact([
      'driver',
    ]));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Driver  $driver
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $driver = Driver::find($id);
    $user = User::find($driver->user_id);

    $this->validate($request, [
      'email' => 'required|unique:users,email,'. $user->id,
      'name' => 'required|unique:drivers,name,'. $id,
      'phone_number' => 'required',
      'nik' => 'required',
    ]);

    $user->update([
      'email' => $request->email,
      'name' => $request->name,
    ]);

    $driver->update([
      'name' => $request->name,
      'no_telp' => $request->phone_number,
      'nik' => $request->nik,
    ]);

    return redirect('/drivers')->with(['status' => 200]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Driver  $driver
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $driver = Driver::find($id);
    $user = User::find($driver->user_id)->delete();
    $driver->delete();

    return response()->json([
      'status' => 200
    ]);
  }
}
