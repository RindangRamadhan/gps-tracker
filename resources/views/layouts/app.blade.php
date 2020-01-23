<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>{{config('app.name')}}</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 4.1.1 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/coreui-icons.min.css"> -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('css/custom-data-table.css')}}">
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">
  <link rel="shortcut icon" type="image/png" href="{{ asset('/image/logo/indomaret.jpg') }}"/>

</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header class="app-header navbar">
  <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">
    <span class="navbar-brand-full">
      <div class="d-flex">
      <img src="{{ asset('/image/logo/indomaret.jpg') }}" width="30" height="30" alt="Indomaret Logo">
      <h5 class="logo-text">Indomaret</h5>
      </div>
    </span>
    <img class="navbar-brand-minimized" src="{{ asset('/image/logo/indomaret.jpg') }}" width="30" height="30" alt="Indomaret Logo">
  </a>
  <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
    <span class="navbar-toggler-icon"></span>
  </button>

  <ul class="nav navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" style="margin-right: 10px" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="icon-user"></i> {!! Auth::user()->name !!}
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="#">
          <i class="fa fa-user"></i> Profile
        </a>
        <a class="dropdown-item" href="{!! url('/logout') !!}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fa fa-lock"></i>Logout
        </a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </div>
    </li>
  </ul>
</header>

<div class="app-body">
  @include('layouts.sidebar')
  <main class="main">      
    <div class="container-fluid">
      <div class="animated fadeIn">
        @yield('content')
      </div>
    </div>
  </main>
</div>
<footer class="app-footer">
  <div>
    <span>&copy; 2019 <a href="https://github.com/RindangRamadhan">RindangRamadhan </a></span>
  </div>
  <!-- <div class="ml-auto">
    <span>Powered by</span>
    <a href="https://coreui.io">CoreUI</a>
  </div> -->
</footer>
</body>
<!-- jQuery 3.1.1 -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();

    // showToast = function(heading, text, icon, loaderBg) {
    //   'use strict';
    //   // resetToastPosition();
    //   $.toast({
    //     heading: heading,
    //     text: text,
    //     showHideTransition: 'slide',
    //     icon: icon,
    //     loaderBg: loaderBg,
    //     position: {
    //       right: 1,
    //       top: 60
    //     },
    //   })
    // };
  });
</script>
@yield('scripts')

</html>
