@extends('layouts.masterBlank')

@section('title')
  <title>Master Login | BMT</title>
@endsection

@section('content')
  <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card-group d-block d-md-flex row">
            <div class="card col-md-7 p-4 mb-0">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-medium-emphasis">Sign In to your account</p>
                <form action="/book-master/do-login" method="post">
                  @csrf
                  <div class="input-group mt-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                    </svg></span>
                    <input class="form-control" type="text" placeholder="Username" name="username">
                  </div>
                  @error('username')
                    <span class="danger">{{ $message }}</span>
                  @enderror
                  <div class="input-group mt-4"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                    </svg></span>
                    <input class="form-control" type="password" placeholder="Password" name="password">
                  </div>
                  @error('password')
                    <span class="danger">{{ $message }}</span>
                  @enderror

                  @error('fail')
                    <span class="danger message-danger">{{ $message }}</span>
                  @enderror
                  <div class="row mt-4">
                    <div class="col-6">
                      <button class="btn btn-primary px-4" type="submit">Login</button>
                    </div>
                    <div class="col-6 text-end">
                      <button class="btn btn-link px-0" type="button">Forgot password?</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection