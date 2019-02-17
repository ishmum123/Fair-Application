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
                {{--Name--}}
                <div class="wrap-input100 validate-input m-b-26" data-validate="Name is required">
                    <span class="label-input100">Name</span>
                    <input class="input100" type="text" name="name" placeholder="Enter name" value="{{ old('name') }}">
                    <span class="focus-input100"></span>

                </div>
                {{--Email--}}
                <div class="wrap-input100 validate-input m-b-{{ $errors->has('email')? 0:26 }}" data-validate="Email is required">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
                    <span class="focus-input100"></span>

                </div>
                @if($errors->has('email'))
                    <small for="" style="color: red;">{{ $errors->first('email') }}</small>
                @endif

                {{--Phone number--}}
                {{--validate-input m-b-{{ $errors->has('applicant_mobile')? 0:26 }}" data-validate="Phone Number is required if Telephone"--}}
                <div class="wrap-input100 m-b-26">
                    <span class="label-input100">Mobile</span>
                    <input class="input100" type="text" name="applicant_mobile" placeholder="Enter phone number" value="{{ old('applicant_mobile') }}">
                    <span class="focus-input100"></span>

                </div>
                @if($errors->has('applicant_mobile'))
                    <small for="" style="color: red;">{{ $errors->first('applicant_mobile') }}</small>
                @endif

                {{--telephone number--}}
                <div class="wrap-input100 m-b-26" >
                    <span class="label-input100">Telephone</span>
                    <input class="input100" type="text" name="applicant_telephone" placeholder="Enter telephone number" value="{{ old('applicant_telephone') }}">
                    <span class="focus-input100"></span>

                </div>
                @if($errors->has('applicant_telephone'))
                    <small for="" style="color: red;">{{ $errors->first('applicant_telephone') }}</small>
                @endif


                {{--Organization name--}}
                <div class="wrap-input100 validate-input m-b-{{ $errors->has('applicant_name')? 0:26 }}" data-validate="Organization name is required">
                    <span class="label-input100">Organization Name</span>
                    <input class="input100" type="text" name="applicant_name" placeholder="Enter organization name" value="{{ old('applicant_name') }}">
                    <span class="focus-input100"></span>

                </div>
                @if($errors->has('applicant_name'))
                    <small for="" style="color: red;">{{ $errors->first('applicant_name') }}</small>
                @endif


                {{--Organization address--}}
                <div class="wrap-input100 validate-input m-b-{{ $errors->has('applicant_address')? 0:26 }}" data-validate="Organization address is required">
                    <span class="label-input100">Organization Address</span>
                    <input class="input100" type="text" name="applicant_address" placeholder="Enter organization address" value="{{ old('applicant_address') }}">
                    <span class="focus-input100"></span>

                </div>
                @if($errors->has('applicant_address'))
                    <small for="" style="color: red;">{{ $errors->first('applicant_address') }}</small>
                @endif


                {{--Password--}}
                <div class="wrap-input100 validate-input m-b-{{ $errors->has('password')? 0:18 }}" data-validate = "Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="Enter password">
                    <span class="focus-input100"></span>
                </div>
                @if($errors->has('password'))
                    <small for="" style="color: red;">{{ $errors->first('password') }}</small>
                @endif


                {{--Password Confirmation--}}
                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password Confirmation is required">
                    <span class="label-input100">Confirm Password</span>
                    <input class="input100" type="password" name="password_confirmation" placeholder="Confirm password">
                    <span class="focus-input100"></span>
                </div>


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

<script type="text/javascript">
    // function validateForm() {
    //     var id = true;
    //     var x = document.forms["myform"]["applicant_telephone"].value;
    //     var y = document.forms["myform"]["applicant_mobile"].value;
    //     if (x == "" && y == "") {
    //         document.getElementById("hint").innerHTML = "Phone number or Telephone number must be filled up";
    //         id = false;
    //     }
    //     return id;
    // }
</script>

</body>
</html>