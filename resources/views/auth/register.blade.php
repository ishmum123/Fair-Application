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
            <div class="login100-form-title" style="background-image: url(__login/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign Up
					</span>
            </div>

            <form class="login100-form validate-form" method="post" action="/register">
                @csrf
                <div class="wrap-input100 validate-input m-b-26" data-validate="Name is required">
                    <span class="label-input100">Name</span>
                    <input class="input100" type="text" name="name" placeholder="Enter name" value="{{ old('name') }}">
                    <span class="focus-input100"></span>

                </div>
                <div class="wrap-input100 validate-input m-b-{{ $errors->has('email')? 0:26 }}" data-validate="Email is required">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
                    <span class="focus-input100"></span>

                </div>
                @if($errors->has('email'))
                        <small for="" style="color: red;">{{ $errors->first('email') }}</small>
                @endif

                <div class="wrap-input100 validate-input m-b-{{ $errors->has('password')? 0:18 }}" data-validate = "Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="Enter password">
                    <span class="focus-input100"></span>
                </div>
                @if($errors->has('password'))
                    <small for="" style="color: red;">{{ $errors->first('password') }}</small>
                @endif

                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password Confirmation is required">
                    <span class="label-input100">Confirm Password</span>
                    <input class="input100" type="password" name="password_confirmation" placeholder="Confirm password">
                    <span class="focus-input100"></span>
                </div>

                {{--<div class="flex-sb-m w-full p-b-30">--}}
                    {{--<div class="contact100-form-checkbox">--}}
                        {{--<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">--}}
                        {{--<label class="label-checkbox100" for="ckb1">--}}
                            {{--Remember me--}}
                        {{--</label>--}}
                    {{--</div>--}}

                    {{--<div>--}}
                        {{--<a href="#" class="txt1">--}}
                            {{--Forgot Password?--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Sign up
                    </button>
                </div>
                <div style="padding-top: 30px;" class="flex-sb-m w-full p-b-30">
                    <label>Already member ? </label><a href="/login">Login</a>
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