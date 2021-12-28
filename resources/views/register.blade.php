@extends('layouts.default')

@section('title')
  <title>Register</title>
@endsection

@section('content')
  <div class="container">
  <!-- <div class="row justify-content-center">
    <div class="col-md-6 text-center mb-5">
      <h2 class="heading-section">Login #10</h2>
    </div>
  </div> -->
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
      <div class="login-wrap p-0">
        <h3 class="mb-4 text-center">Create an account?</h3>
        <form action="/do-register" method="POST" class="signup-form">
          @csrf
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}">
            @error('username')
              <span class="danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <input id="password-field" type="password" class="form-control" name="password" placeholder="Password">
            @error('password')
              <span class="danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <input id="password-field" type="password" class="form-control" name="password_confirmation" placeholder="Password confirmation">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
            @error('email')
              <span class="danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone') }}">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address') }}">
          </div>
          <div class="form-group">
            <button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
          </div>
          <a href="/login" style="color: #000; display: inline-block"class="w-100 text-center">&mdash; Login &mdash;</a>
        </form>
      </div>
    </div>
  </div>
@endsection