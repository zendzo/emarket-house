@extends('auth.login-v1.layouts')

@section('form')
<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
  @csrf
  <span class="login100-form-title">
    {{ __(Request::segment(1)) }}
  </span>
  
  @if ($errors->has('email'))
    <div class="text-center p-t-12">
      <a class="txt2" href="#" style="color: #c80000;">
          {{ $errors->first('email') }}
      </a>
    </div>
  @endif
  <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
    <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
    <span class="focus-input100"></span>
    <span class="symbol-input100">
      <i class="fa fa-envelope" aria-hidden="true"></i>
    </span>
  </div>
  @if ($errors->has('password'))
    <div class="text-center p-t-12">
      <a class="txt2" href="#" style="color: #c80000;">
          {{ $errors->first('password') }}
      </a>
    </div>
  @endif
  <div class="wrap-input100 validate-input" data-validate = "Password is required">
    <input class="input100" type="password" name="password" placeholder="Password">
    <span class="focus-input100"></span>
    <span class="symbol-input100">
      <i class="fa fa-lock" aria-hidden="true"></i>
    </span>
  </div>
  
  <div class="container-login100-form-btn">
    <button class="login100-form-btn">
      Login
    </button>
  </div>

  <div class="text-center p-t-12">
    <span class="txt1">
      Forgot
    </span>
    <a class="txt2" href="#">
      Username / Password?
    </a>
  </div>

  <div class="text-center p-t-136">
    {{-- <a class="txt2" href="{{ route('register') }}">
      Create your Account
      <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
    </a> --}}
  </div>
</form>
@endsection