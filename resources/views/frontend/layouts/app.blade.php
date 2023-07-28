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
        <link rel="shortcut icon" href="https://thegrowthindia.in/assets/Images/Logo/Icon.png" />

        <link rel="stylesheet" href="https://thegrowthindia.in/assets/Site/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://thegrowthindia.in/assets/Site/css/owl.carousel.min.css" />
        <link rel="stylesheet" href="https://thegrowthindia.in/assets/Site/css/owl.theme.default.min.css" />
        <link rel="stylesheet" href="https://thegrowthindia.in/assets/Site/css/slick.css" />
        <link rel="stylesheet" href="https://thegrowthindia.in/assets/Site/css/slick-theme.css" />
        <link rel="stylesheet" href="https://thegrowthindia.in/assets/Site/css/select2.min.css" />
        <link rel="stylesheet" href="https://thegrowthindia.in/assets/Site/css/aos.css" />
        <link rel="stylesheet" href="https://thegrowthindia.in/assets/Site/css/feather.css" />
        <link rel="stylesheet" href="https://thegrowthindia.in/assets/Site/css/lity.css" />

        <link rel="stylesheet" href="https://thegrowthindia.in/assets/Site/css/dashboard.css" />
        <link rel="stylesheet" href="https://thegrowthindia.in/assets/Site/css/snackbar.min.css" />
        <link rel="stylesheet" href="https://thegrowthindia.in/assets/Site/css/webfonts/gordita.css" />
        <link rel="stylesheet" href="https://thegrowthindia.in/assets/Site/css/style.css" />
        <link rel="stylesheet" href="https://thegrowthindia.in/assets/Site/css/custom.css" />
        <link rel="stylesheet" href="https://thegrowthindia.in/assets/Site/css/my-profile.css" />
        <style>
            @import url(https://thegrowthindia.in/assets/Site/css/index.css);

            .our-alumni-sec .owl-item {
                background: #fae5e4;
                padding: 18px 20px;
                border-radius: 10px;
                text-align: left;
            }

        </style>
        <style>
            @import url(https://thegrowthindia.in/assets/Site/css/login.css);

        </style>
        <script src="https://thegrowthindia.in/assets/Site/js/jquery-3.6.0.min.js"></script>
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
