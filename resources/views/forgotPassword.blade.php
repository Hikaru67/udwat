@extends('layouts.default')

@section('title')
  <title>Forgot password</title>
@endsection

@section('content')
  <main>
    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
    <div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
      <div class="login-wrap p-0">
        <h3 class="mb-4 text-center">Recover your password</h3>
        <form action="/recover-password" method="post" class="signin-form">
          @csrf
          <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email">
            @error('email')
              <span class="danger">{{ $message }}</span>
            @enderror
          </div>
          @error('fail')
            <span class="danger message-danger">{{ $message }}</span>
          @enderror
          <div class="form-group">
            <button type="submit" class="form-control btn btn-primary submit px-3">Recover password</button>
          </div>
          @if(session('success'))
            <h5 class="success message-success">{{session('success')}}</h5>
          @endif
        </form>
        <a href="/login" style="color: #000; display: inline-block"class="w-100 text-center">&mdash; Login &mdash;</a>
      </div>
    </div>
  </div>
    </section>
    <!--================login_part end =================-->
  </main>
@endsection