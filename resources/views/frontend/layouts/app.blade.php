<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RichInd - Online Courses & Education</title>
    <meta name="description" content="RichInd - Online Courses & Education">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.png')}}">
    <!-- Place favicon.ico in the root directory -->
    <!-- CSS here -->

    @include('frontend.layouts.css')
</head>

<body>
    <!--Preloader-->
    {{-- <div id="preloader">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon"><img src="{{ asset('frontend/assets/img/favicon.png')}}" alt="Preloader"></div>
            </div>
        </div>
    </div> --}}
    <!--Preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="tg-flaticon-arrowhead-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    @include('frontend.layouts.header')

        @yield('content')

    @include('frontend.layouts.footer')
    <!-- footer-area-end -->

    <!-- JS here -->
    @include('frontend.layouts.js')
</body>

</html>
