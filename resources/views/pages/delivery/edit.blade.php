@extends('layouts.app')

@section('content')
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a style="color: #262a2e" href="/delivery"> Delivery </a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
    <!-- Breadcrumb Menu-->
    <li class="breadcrumb-menu d-md-down-none">
      <div class="btn-group" role="group" aria-label="Button group">
        <a class="btn" href="/home">
          <i class="icon-home"></i>
        </a>
        <a style="color: #73818f" href="Javascript:void(0)">/</a>
        <a class="btn" href="Javascript:void(0)">
          <i class="icon-grid"></i>
        </a>
      </div>
    </li>
  </ol>
  
  <div class="card">
    <div class="card-header">
      <strong>Car Form</strong>
    </div>
    <div class="card-body">
      <form action="{{ url('/delivery', $delivery->id) }}" method="post">
        @csrf
        {{ method_field('PATCH') }}
        @include('pages.delivery.form')

        <div class="footer-buttons">
          <a 
            href="{{ url('/delivery') }}" 
            class="btn btn-icon btn-warning">
              <i class="icon-arrow-left-circle"></i>
          </a>
          <button 
            type="submit" 
            class="btn btn-icon btn-info">
              <i class="icon-check"></i>
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('scripts')
<script>
  let drivers = <?php echo $drivers; ?>;
  let cars = <?php echo $cars; ?>;
  let driver_selected = <?php echo $delivery->driver_id; ?>;
  let car_selected = <?php echo $delivery->car_id; ?>;

  // Select2 Driver
  $(document).ready(function() {
    let driver = []
        
    drivers.forEach(val => {
      driver.push({
        id: val.id,
        text: `${val.name}`,
      })
    });

    $('#driver').select2({
      data: driver,
      placeholder: 'Select Driver'
    });
    
    $('#driver').val(driver_selected).change()
  });

  // Select2 Car
  $(document).ready(function() {
    let car = []
        
    cars.forEach(val => {
      car.push({
        id: val.id,
        text: `${val.name} - ${val.plate_number}`,
      })
    });

    $('#car').select2({
      data: car,
      placeholder: 'Select Car'
    });
    
    $('#car').val(car_selected).change()
  });
</script>
@endsection