@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-6 col-lg-4">
            <div class="card text-white bg-primary">
              <div class="card-body">
                <div class="text-value">{{ $cars }}</div>
                <div style="font-size: 30px">
                  Drivers <i class="fa fa-user float-right"></i>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-->
          <div class="col-sm-6 col-lg-4">
            <div class="card text-white bg-info">
              <div class="card-body">
                <div class="text-value">{{ $drivers }}</div>
                <div style="font-size: 30px">
                  Cars <i class="fa fa-car float-right"></i>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-->
          <div class="col-sm-6 col-lg-4">
            <div class="card text-white bg-warning">
              <div class="card-body">
                <div class="text-value">{{ $delivery }}</div>
                <div style="font-size: 30px">
                  Delivery /Month <i class="fa fa-truck float-right"></i>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-->
        </div>
      </div>
    </div>
  </div>
  <!-- /.row-->
@endsection
