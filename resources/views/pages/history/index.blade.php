@extends('layouts.app')

@section('content')
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item active">History</li>
    <!-- Breadcrumb Menu-->
    <li class="breadcrumb-menu d-md-down-none">
      <div class="btn-group" role="group" aria-label="Button group">
        <a class="btn" href="Javascript:void(0)">
          <i class="icon-reload"></i>
        </a>
      </div>
    </li>
  </ol>
  
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
      <table id="example" class="table table-sm table-striped" style="width:100%; border: 1px solid #e9ecef;">
        <thead>
            <tr>
              <th>Driver </th>
              <th>Location</th>
              <th>Coordinat</th>
              <th>Time</th>
            </tr>
        </thead>
        <tbody>
          @foreach($trackers as $data)
            @php $location = json_decode($data->location); @endphp
            <tr>
              <td>{{ $data->driver['name'] }}</td>
              <td>{{ $location->address }}</td>
              <td>{{ $location->lat }}, {{ $location->long }}</td>
              <td>{{ $data->created_at }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
  <!-- Button Floating Fix -->
  <div class="footer-buttons">
    <button 
      type="button" 
      class="btn btn-icon btn-warning"
      onClick="window.location.reload();">
        <i class="icon-refresh"></i>
    </button>
    </a>
  </div>
@endsection

@section('scripts')
@endsection