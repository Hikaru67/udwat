@extends('layouts.home')

@section('title')
  <title>Login</title>
@endsection

@section('content')
  <!-- <div class="row justify-content-center">
    <div class="col-md-6 text-center mb-5">
      <h2 class="heading-section">Login #10</h2>
    </div>
  </div> -->
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
      <div class="login-wrap p-0">
        <h3 class="mb-4 text-center">Have an account?</h3>
        <form action="/do-login" method="post" class="signin-form">
          @csrf
          <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username">
            @error('username')
              <span class="message-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <input id="password-field" type="password" class="form-control" name="password" placeholder="Password">
            @error('password')
              <span class="message-danger">{{ $message }}</span>
            @enderror
          </div>
          @error('wrong_password')
            <span class="message-danger">{{ $message }}</span>
          @enderror
          <div class="form-group">
            <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
          </div>
          <div class="form-group d-md-flex">
            <div class="w-50">
              <label class="checkbox-wrap checkbox-primary">Remember Me
                <input type="checkbox" checked>
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="w-50 text-md-right">
              <a href="/forgot-password" style="color: #fff">Forgot Password</a>
            </div>
          </div>
        </form>
        <a href="/register" style="color: #fff; display: inline-block"class="w-100 text-center">&mdash; Or Create An Account &mdash;</a>
        <!-- <div class="social d-flex text-center">
          <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
          <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
        </div> -->
      </div>
    </div>
  </div>
@endsection