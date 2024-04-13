<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{env('APP_NAME')}}</title>
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/assets/images/favicon.png')}}" />
        <meta name="description" content=""/>

        {{-- Start CSS --}}
        @include('frontend.layouts.css')
        {{-- End CSS --}}

    </head>
    <body class="custom-cursor">

        <div class="custom-cursor__cursor"></div>
        <div class="custom-cursor__cursor-two"></div>



        <div class="page-wrapper">

            {{-- Start Header --}}
            @include('frontend.layouts.header')
            {{-- End Header --}}

                {{-- Start Content --}}
                @yield('content')
                {{-- End Content --}}

            {{-- Start Footer --}}
            @include('frontend.layouts.footer')
            {{-- End Footer --}}

        </div>
    </body>
</html>
