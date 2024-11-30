<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>AdminLTE | Dashboard v2</title><!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE | Dashboard v2">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"><!--end::Primary Meta Tags--><!--begin::Fonts-->
   
    @include('layouts.adminlte.css')
</head>

<body class="login-page bg-body-secondary">
  <div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header"> <a href="../index2.html" class="text-center link-dark link-offset-2 link-opacity-100 link-opacity-50-hover">
                <h1 class="mb-0"> <b>Admin</b>LTE
                </h1>
            </a> </div>
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input class="form-check-input" type="hidden" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <div class="mb-1 input-group">
                    <div class="form-floating"> 
                      <input id="loginEmail" type="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="" placeholder=""> <label for="loginEmail">Email</label> 
                    </div>
                    <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="mb-1 input-group">
                    <div class="form-floating"> 
                      <input id="loginPassword" type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder=""> <label for="loginPassword">Password</label> 
                    </div>
                    <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div> <!--begin::Row-->
                <div class="row">
                    <div class="col-12">
                        <div class="gap-2 d-grid"> <button type="submit" class="btn btn-primary">Sign In</button> </div>
                    </div> <!-- /.col -->
                </div> <!--end::Row-->
            </form>
        </div> <!-- /.login-card-body -->
    </div>
  </div>

  @include('layouts.adminlte.js')
</body>
</html>
