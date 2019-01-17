<!DOCTYPE html>
<html lang="en">
<head>
    <title>festival</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('__login/images/icons/favicon.ico') }}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('__login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('__login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('__login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('__login/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('__login/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('__login/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('__login/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('__login/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('__login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('__login/css/main.css') }}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" >
					<span class="login100-form-title-1">
						Reset Password
					</span>
            </div>
            <div>
                @if (session('status'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <form class="login100-form validate-form" method="post" action="/password/email">
                @csrf
                <div class="wrap-input100 validate-input m-b-{{ $errors->has('email')? 0:18 }}" data-validate="Email is required">

                    <span class="label-input100">Email Address</span>
                    <input class="input100" type="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
                    <span class="focus-input100"></span>
                </div>
                @if($errors->has('email'))
                    <small for="" style="color: red;">{{ $errors->first('email') }}</small>
                @endif



                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Send Password Reset Link
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="{{ asset('__login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('__login/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('__login/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('__login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('__login/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('__login/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('__login/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('__login/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('__login/js/main.js') }}"></script>

</body>
</html>