@extends('layouts.default')

@section('title')
  <title>Renew password</title>
@endsection

@section('content')
  <main>
    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="#" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Update your password</h3>
                            @error('fail')
                                <span class="danger message-danger">{{ $message }}</span>
                            @enderror
                            <form class="row contact_form" action="renew-password" method="post">
                                @csrf
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value=""
                                        placeholder="Confirm password">
                                </div>
                                @error('password')
                                  <span class="danger">{{ $message }}</span>
                                @enderror
                                @if(request()->get('code'))
                                    <input type="hidden" value="{{request()->get('code')}}" name="code">
                                @endif
                                @if(request()->get('email'))
                                    <input type="hidden" value="{{request()->get('email')}}" name="email">
                                @endif
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="btn_3">
                                        Update password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->
  </main>
@endsection