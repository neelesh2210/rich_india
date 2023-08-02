<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Rich India</title>
        <meta name="keywords" content="Rich India" />
        <meta name="description" content="Rich India" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('user_dashboard/images/favicon.png')}}">

        <!-- App css -->
        <link href="{{ asset('user_dashboard/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('user_dashboard/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
        <link rel="stylesheet" href="{{asset('user_dashboard/css/daterangepicker.css')}}">
        <link rel="stylesheet" href="{{asset('backend/css/bootstrap-4.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/webfonts/gordita.css')}}" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script async src="https://www.googletagmanager.com/gtag/js?id=G-YJRTMGTBXB"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-YJRTMGTBXB');
        </script>

    </head>

    <body class="loading " data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true" @if(Route::currentRouteName() == "user.course.detail")data-leftbar-compact-mode="condensed" @endif>
        @include('user_dashboard.layouts.sidebar')
        @include('user_dashboard.layouts.header')
        @yield('content')
        @include('user_dashboard.layouts.footer')


    </body>

</html>
