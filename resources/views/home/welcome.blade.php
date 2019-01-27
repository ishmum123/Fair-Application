<!DOCTYPE html>
<html lang="en">
<head>
    <title>festival</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('welcome/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('welcome/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('welcome/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('welcome/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('welcome/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('welcome/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('welcome/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('welcome/css/animate.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">



    <link rel="stylesheet" href="{{ asset('welcome/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('welcome/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('welcome/css/style.css') }}">

</head>
<body>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <div class="site-navbar-wrap js-site-navbar bg-white">

        <div class="container">
            <div class="site-navbar bg-light">
                <div class="py-1">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h2 class="mb-0 site-logo"><a href="#">Festival Application BD</a></h2>
                        </div>
                        <div class="col-8">
                            <nav class="site-navigation text-right" role="navigation">
                                <div class="container">
                                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                                    <ul class="site-menu js-clone-nav d-none d-lg-block">

                                        <li><a href="/login">Login</a></li>
                                        <li><a href="/register">Register</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="height: 113px;"></div>
    <div class="slide-one-item home-slider owl-carousel">

        <div class="site-blocks-cover" style="background-image: url(welcome/images/hero_b1_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 text-center" data-aos="fade">
                        <h1>For The Time <strong>Is At Hand</strong></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-blocks-cover" style="background-image: url(welcome/images/wel1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 text-center" data-aos="fade">
                        <h1>The <strong>Truth</strong> Will Set You Free</h1>
                    </div>
                </div>
            </div>
        </div>

        @php
            $welcomes = \Illuminate\Support\Facades\DB::table('welcomes')->where('active', 1)->get();
        @endphp
        @if($welcomes->count())
            @foreach( $welcomes as $welcome)
                <div class="site-blocks-cover" style="background-image: url('/uploads/{{ $welcome->image_location }}');" data-aos="fade" data-stellar-background-ratio="0.5">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 text-center" data-aos="fade">
                                {{--<h1>For The Time <strong>Is At Hand</strong></h1>--}}
                                <h1> {{ $welcome->image_text }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        @endif






        {{--<div class="site-blocks-cover" style="background-image: url(welcome/images/fest01.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">--}}
            {{--<div class="container">--}}
                {{--<div class="row align-items-center justify-content-center">--}}
                    {{--<div class="col-md-7 text-center" data-aos="fade">--}}
                        {{--<h1>The <strong>Truth</strong> Will Set You Free</h1>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>


    <script src="{{ asset('welcome/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('welcome/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('welcome/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('welcome/js/popper.min.js') }}"></script>
    <script src="{{ asset('welcome/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('welcome/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('welcome/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('welcome/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('welcome/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('welcome/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('welcome/js/aos.js') }}"></script>


    <script src="{{ asset('welcome/js/mediaelement-and-player.min.js') }}"></script>

    <script src="{{ asset('welcome/js/main.js') }}"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

            for (var i = 0; i < total; i++) {
                new MediaElementPlayer(mediaElements[i], {
                    pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                    shimScriptAccess: 'always',
                    success: function () {
                        var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                        for (var j = 0; j < targetTotal; j++) {
                            target[j].style.visibility = 'visible';
                        }
                    }
                });
            }
        });
    </script>

</body>
</html>