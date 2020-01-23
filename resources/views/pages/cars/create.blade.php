@extends('layouts.app')

@section('content')
  <!-- Breadcrumb-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a style="color: #73818f" href="/home"> Dashboard </a>
    </li>
    <li class="breadcrumb-item">
      <a style="color: #73818f" href="/cars"> Cars </a>
    </li>
    <li class="breadcrumb-item active">Create</li>
    <!-- Breadcrumb Menu-->
    <li class="breadcrumb-menu d-md-down-none">
      <div class="btn-group" role="group" aria-label="Button group">
        <a class="btn" href="/home">
          <i class="icon-speedometer"></i>
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
      <form action="{{ url('/cars') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('pages.cars.form')

        <div class="footer-buttons">
          <a 
            href="{{ url('/cars') }}" 
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