@extends('layouts.applogin')

@section('title', 'login')

@section('content')
<div class="login-box">
  <!-- /.login-logo -->
<div class="card card-outline bg-white ">
  <div class="card-body ">
    <div class="w-100">
      <div class="text-center">
          <a href="../public"><img src="https://res.cloudinary.com/dv8zlgkxm/image/upload/v1714876011/Esthyan_wuwlmi.png" alt=""  style="width:50%;" ></a>
      </div>
    </div>
      <form method="POST" action="{{ route('login') }}">
                        @csrf
        <div class="input-group mb-3" style="width:90%; margin:0 auto;border-bottom:2px solid #7F96FF;">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror bg-white border-0" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text bg-white border-0">
              <span class="fas fa-envelope" style="color:#2948D1;"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3" style="width:90%; margin:0 auto;border-bottom:2px solid #7F96FF;">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror bg-white border-0" name="password" required autocomplete="current-password" placeholder="Password">
          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text bg-white border-0">
              <span class="fas fa-lock" style="color:#2948D1;"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="w-100">
            
          </div>
          <!-- /.col -->
          <!-- /.col -->
        </div>
        <div class="d-flex justify-content-center w-100 mt-4">
          <button type="submit" class="btn w-75" style="background:#7F96FF;">
                  <b>{{ __('Sing in') }}</b>
          </button>
          </div>
      </form>

      
      <!-- /.social-auth-links -->

     
          <div class="text-center">
            @if (Route::has('password.request'))
               <a class="btn btn-link" href="{{ route('password.request') }}">
                   {{ __('Forgot Your Password?') }}
                </a>
            @endif
          </div>

      <div class="w-100 d-flex justify-content-center align-items-center mt-5">
        <div class="text-center mr-2">New in ESTHYAN?</div>
        <a href="register"> 
          <button type="submit" class="btn w-100" style="background:#2948D1; color:white;" >
                  <b>{{ __('Create account') }}</b>
          </button>
        </a>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

@endsection
