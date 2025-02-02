<!DOCTYPE html>
<html lang="en">
<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Login</title>
  <meta name="description" content="CoreUI Template - InfyOm Laravel Generator">
  <meta name="keyword" content="CoreUI,Bootstrap,Admin,Template,InfyOm,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
  <!-- Bootstrap-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/coreui-icons.min.css"> -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css"
      rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
</head>

<style>
  .background {
    background-image: url('{{ url('/image/logo/364.jpg') }}');
    background-color: white;
    background-repeat:no-repeat;
    background-size: 75%;
    background-position:center;
    position: relative;
  }

  .op-09 {
    opacity: 0.9
  }
</style>

<body class="app flex-row align-items-center background">
<div class="container-fluid op-09">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card-group">
        <div class="card p-4">
          <div class="card-body">
            <form method="post" action="{{ url('/login') }}">
              {!! csrf_field() !!}
              <h1>Login</h1>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-user"></i>
                  </span>
                </div>
                <input type="email" class="form-control {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email') }}" placeholder="Email">
                @if ($errors->has('email'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-lock"></i>
                  </span>
                </div>
                <input type="password" class="form-control {{ $errors->has('password')?'is-invalid':'' }}" placeholder="Password" name="password">
                @if ($errors->has('password'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
              <div class="row">
                <div class="col-6">
                  <button class="btn btn-primary px-4" type="submit">Login</button>
                </div>
                <div class="col-6 text-right">
                  <!-- <a class="btn btn-link px-0" href="{{ url('/password/reset') }}">
                    Forgot password?
                  </a> -->
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
          <div class="card-body text-center">
            <div>
              <h2>Welcome</h2>
              <p>
                Please Login into your account.
              </p>
              <br><br>
              <p>&copy; 2020<p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- CoreUI and necessary plugins-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.js"></script>
</body>
</html>
