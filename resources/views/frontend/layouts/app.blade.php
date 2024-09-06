<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - Online Courses & Education</title>
    <meta name="description" content="RichInd - Online Courses & Education">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.png') }}">

    {{-- Start CSS --}}
    @include('frontend.layouts.css')
    {{-- End CSS --}}

</head>

<body>
    {{-- Preloader --}}
    <div id="preloader">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon"><img src="{{ asset('frontend/assets/img/favicon.png') }}" alt="Preloader">
                </div>
            </div>
        </div>
    </div>
    {{-- Preloader-end --}}

    {{-- Scroll-top --}}
    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="tg-flaticon-arrowhead-up"></i>
    </button>
    {{-- Scroll-top-end --}}
    {{-- main-area --}}
    <main class="main-area fix">
        {{-- Start Header --}}
        @include('frontend.layouts.header')
        {{-- End Header --}}

        {{-- Start Content --}}
        @yield('content')
        {{-- End Content --}}

        {{-- Start Footer --}}
        @include('frontend.layouts.footer')
        {{-- End Footer --}}

    </main>
    {{-- main-area-end --}}
</body>

</html>
