<!doctype html>
<html lang="en">

<head>
  <title>Login 10</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="@/../css/style.css">

</head>

<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
  <section class="ftco-section">
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
                  <span class="message-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <input id="password-field" type="password" class="form-control" name="password" placeholder="Password">
                @error('password')
                  <span class="message-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <input id="password-field" type="password" class="form-control" name="password_confirmation " placeholder="Password confirmation">
                @error('password')
                  <span class="message-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                  <span class="message-danger">{{ $message }}</span>
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
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>