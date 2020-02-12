@php
  $url = explode("/", Request::path());
@endphp

<li class="nav-item">
  <a class="nav-link" href="{{ url('home') }}">
    <i class="nav-icon icon-home"></i> Dashboard
  </a>
</li>

@if(Auth::user()->role == NULL)
<li class="nav-item nav-dropdown {{ ($url[0] == 'cars' || $url[0] == 'drivers' || $url[0] == 'users') ? 'open' : '' }}">
  <a class="nav-link nav-dropdown-toggle" href="#">
    <i class="nav-icon icon-grid"></i> Master Data</a>
  <ul class="nav-dropdown-items">
    <li class="nav-item">
      <a class="nav-link {{ $url[0] == 'cars' ? 'active' : '' }}" href="{{ url('cars') }}">
        <i class="nav-icon icon-minus" style="font-size: 10px"></i> Cars</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ $url[0] == 'drivers' ? 'active' : '' }}" href="{{ url('drivers') }}">
        <i class="nav-icon icon-minus" style="font-size: 10px"></i> Drivers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ $url[0] == 'users' ? 'active' : '' }}" href="{{ url('users') }}">
        <i class="nav-icon icon-minus" style="font-size: 10px"></i> Users</a>
    </li>
  </ul>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ url('delivery') }}">
    <i class="nav-icon icon-direction"></i> Delivery
  </a>
</li>
@endif

<li class="nav-item">
  <a class="nav-link {{ $url[0] == 'tracking' ? 'active' : '' }}" href="{{ url('tracking') }}">
    <i class="nav-icon icon-map"></i> Tracking
  </a>
</li>
<li class="nav-item">
  <a class="nav-link {{ $url[0] == 'history' ? 'active' : '' }}" href="{{ url('history') }}">
    <i class="nav-icon icon-reload"></i> History
  </a>
</li>
<li class="nav-item">
  <a class="nav-link {{ $url[0] == 'reports' ? 'active' : '' }}" href="{{ url('reports') }}">
    <i class="nav-icon icon-book-open"></i> Reports
  </a>
</li>