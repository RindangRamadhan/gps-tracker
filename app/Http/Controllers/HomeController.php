<?php

namespace App\Http\Controllers;

use App\Car;
use App\Driver;
use App\Delivery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $cars = Car::count();
    $drivers = Driver::count();
    $delivery = Delivery::count();

    return view('home')->with(
      compact([
        'cars',
        'drivers',
        'delivery'
      ])
    );
  }
}
