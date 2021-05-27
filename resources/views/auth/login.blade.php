<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Security Login | {{ config('app.name', 'Laravel') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{secure_asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{secure_asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css"> -->
    <link rel="stylesheet" href="{{secure_asset('adminlte/dist/css/adminlte.min.css')}}">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css"> -->

    <!-- iCheck -->
    <link rel="stylesheet" href="{{secure_asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

</head>
<body class="hold-transition login-page" style="background-image: url({{secure_asset('adminlte/dist/img/login-bg-14.jpg')}});">
<div style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-size: cover; background-repeat: no-repeat; background-position: center; background: linear-gradient(to bottom,rgba(0,0,0,.45) 0,rgba(0,0,0,.9));">
</div>
<div class="login-box">
  <div class="login-logo">
    <a href="{{ url('/login') }}"><b>Security </b>Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

        <form id="loginForm" method="post" action="{{ url('/login') }}">
            @csrf

            <div class="input-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" autofocus>
                <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                @if ($errors->has('email'))
                    <span class="error text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>


            <div class="input-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                @if ($errors->has('password'))
                    <span class="error text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>


            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember Me</label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

      <p class="mb-1">
        <a href="{{ url('/password/reset') }}">I forgot my password</a>
      </p>
      <!-- <p class="mb-0">
        <a href="{{ url('/register') }}" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<!-- jQuery -->
<script src="{{secure_asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{secure_asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{secure_asset('adminlte/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
