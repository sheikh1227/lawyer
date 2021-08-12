@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="app-content content ">
    <div class="content-wrapper ">
      <div class="content-body">

        
        <div class="auth-wrapper auth-v2">
  <div class="auth-inner row m-0">
      <!-- Brand logo-->
      <a class="brand-logo" href="javascript:void(0);">
       
        <h2 class="brand-text text-primary ml-1">Lawyer</h2>
      </a>
       @if (session('status'))
          <div class="mb-4 font-medium text-sm text-green-600">
              {{ session('status') }}
          </div>
      @endif
      <!-- /Brand logo-->
      <!-- Left Text-->
      <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                    <img class="img-fluid" src="{{ asset('images/login-v2.svg') }}" alt="Login V2">
                  </div>
      </div>
      <!-- /Left Text-->
      <!-- Login-->
      <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
          <h2 class="card-title font-weight-bold mb-1">Welcome to Lawyer! 👋</h2>
          <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>

          <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST" novalidate="novalidate">
             @csrf
            <div class="form-group">
              <label class="form-label" for="login-email">Email</label>
              <input class="form-control @error('email') is-invalid @enderror" id="login-email" type="text" name="email" placeholder="john@example.com" aria-describedby="login-email" value="{{ old('email') }}"  autofocus="" tabindex="1" aria-invalid="false" required>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


            </div>
            <div class="form-group">
              <div class="d-flex justify-content-between">
                <label for="login-password">Password</label>
               
              </div>
              <div class="input-group input-group-merge form-password-toggle">
                <input class="form-control form-control-merge @error('password') is-invalid @enderror" id="login-password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" aria-invalid="false" required>


                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-group-append">
                  <span class="input-group-text cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye font-small-4"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                  </span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div div="" class="custom-control custom-checkbox">
                <input class="custom-control-input" name="remember" id="remember-me" type="checkbox" tabindex="3">
                <label class="custom-control-label" for="remember-me">Remember Me</label>
              </div>
            </div>
            <button class="btn btn-primary btn-block waves-effect waves-float waves-light" tabindex="4">Sign in</button>
          </form>
          @if (Route::has('password.request'))
              <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                  {{ __('Forgot your password?') }}
              </a>
          @endif
          
         
       
      </div>
    </div>
    <!-- /Login-->
  </div>
</div>

      </div>
    </div>
  </div>
@endsection
