<!doctype html>
<html lang="zxx">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{env('APP_NAME')}}</title>

        <meta name="keyword" content="Richind.in -  Learn Earn Grow">
        <meta name="description" content="Richind.in -  Learn Earn Grow">
        <meta name="author" content="Webinmaker Softtech Private Limited" />
        <meta name="subject" content="Richin" />
        <link rel="shortcut icon" href="{{ asset('frontend/assets/images/Icon.png')}}" />
        <script src="https://kit.fontawesome.com/592ef58b65.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.theme.default.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css')}}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick-theme.css')}}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/select2.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css')}}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/feather.css')}}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/lity.css')}}" />

        <link rel="stylesheet" href="{{ asset('frontend/assets/css/dashboard.css')}}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/snackbar.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/webfonts/gordita.css')}}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css')}}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/my-profile.css')}}" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/index.css')}}" />
        <style>
            .our-alumni-sec .owl-item {
                background: #fae5e4;
                padding: 18px 20px;
                border-radius: 10px;
                text-align: left;
            }

        </style>
        <style>
            @import url({{ asset('frontend/assets/css/login.css')}});

        </style>
        <script src="{{ asset('frontend/assets/js/jquery-3.6.0.min.js')}}"></script>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-2W1107GP9Y"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-2W1107GP9Y');
        </script>
    </head>

    <body>
        <div class="main-wrapper">

            {{-- @include('frontend.layouts.header') --}}
            @include('frontend.layouts.nav')

                @yield('content')

            @include('frontend.layouts.footer')

        </div>
    </body>

</html>
