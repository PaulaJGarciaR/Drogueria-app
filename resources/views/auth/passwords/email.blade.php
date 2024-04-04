@extends('layouts.applogin')

@section('content')
<div class="container" style="margin-top:110px;">
    <div class="row justify-content-center ">
        <div class="w-50">
            <div class="card bg-white w-100 ">
                <div class="mt-3 text-center "><h3 class="text-purple"><b>{{ __('Reset Password') }}</b></h3></div>
                <div class="w-100 d-flex justify-content-center">
                  <div class="w-50 ">
                    <div class="text-center ">
                      <a href="{{asset('../public')}}"><img src="https://res.cloudinary.com/dv8zlgkxm/image/upload/v1710475666/Esthyan_n54lng.png" alt=""  style="width:60%;" ></a>
                    </div>
                   </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="">
                            <div class="text-center">
                              <label for="email">{{ __('Email Address') }}</label>
                            </div>
                    
                            <div class=" d-flex justify-content-center ">
                                  <input id="email" type="email" class="w-50 mr-1 bg-white border-2 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="input-group-append">
                                  <div class="input-group-text bg-white border-0">
                                      <span class="fas fa-envelope text-purple"></span>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn bg-purple">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
